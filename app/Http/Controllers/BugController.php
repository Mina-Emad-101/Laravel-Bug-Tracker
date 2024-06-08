<?php

namespace App\Http\Controllers;

use App\Models\Bug;
use App\Models\Message;
use App\Models\Priority;
use App\Models\Project;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class BugController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $bugs = Bug::with(['project', 'priority', 'status'])->orderBy('status_id')->orderBy('priority_id');

        if (Auth::user()->role_id == 2) {
            $bugs = $bugs->where(['assigned_staff_id' => Auth::user()->id]);
        } elseif (Auth::user()->role_id == 3) {
            $bugs = $bugs->where(['reporter_id' => Auth::user()->id]);
        }

        $bugs = $bugs->paginate(perPage: 12);

        return view('bugs.index', [
            'bugs' => $bugs,
        ]);
    }

    /**
     * Update an instance of the resource.
     */
    public function update(Request $request): Redirector|RedirectResponse
    {
        $request->validate([
            'bug_id' => ['required', 'exists:bugs,id'],
            'staff_id' => ['nullable', 'exists:users,id'],
            'priority_id' => ['nullable', 'exists:priorities,id'],
            'message' => ['nullable', 'max:255'],
            'fixed' => ['nullable', 'boolean'],
        ]);

        $bug = Bug::find($request->get('bug_id'));

        // Pseudo Policy until i fix the actual policy (Maybe) :)
        if ($request->user()->role_id != 1 && ! $request->user()->is($bug->assigned_staff)) {
            throw ValidationException::withMessages([
                'bug_id' => 'You do not have Authorization to update Bug',
            ]);
        }

        if ($request->get('priority_id')) {
            $bug->priority_id = $request->get('priority_id');
            $bug->status_id = 2;
        }

        if ($request->get('staff_id')) {
            if (User::find($request->get('staff_id'))->role_id != 2) {
                throw ValidationException::withMessages([
                    'staff_id' => "This ID Doesn't belong to a staff member",
                ]);
            }
            $bug->assigned_staff_id = $request->get('staff_id');
        }

        if ($request->get('message')) {
            $message = new Message;
            $message->sender_id = $request->user()->id;
            $message->receiver_id = $bug->reporter_id;
            $message->bug_id = $bug->id;
            $message->content = $request->get('message');
            $message->created_at = now();
            $message->save();
        }

        if ($request->get('fixed') && ! $request->get('message')) {
            throw ValidationException::withMessages([
                'bug_id' => 'You have to send a Solution Message if Bug is fixed.',
            ]);
        }
        if ($request->get('fixed')) {
            $bug->status_id = 3;
        }

        $bug->save();

        return redirect('/bugs/'.$bug->id);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('bugs.create', ['projects' => Project::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): Redirector|RedirectResponse
    {
        $request->validate([
            'project_id' => ['required'],
            'description' => ['required', 'max:255'],
            'screenshot' => ['required', 'image'],
        ]);

        $newBug = new Bug;
        $newBug->project_id = $request->get('project_id');
        $newBug->status_id = 1;
        $newBug->description = $request->get('description');
        $newBug->reporter_id = $request->get('reporter');
        $newBug->screenshot = $request->file('screenshot')->store('screenshots', 'public');
        $newBug->created_at = now();
        $newBug->save();

        return redirect('/bugs/'.$newBug->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Bug $bug): View
    {
        $inputs = ['bug' => $bug];

        $messages = Message::where('bug_id', '=', $bug->id)->get();
        $inputs = array_merge($inputs, ['messages' => $messages]);

        if (! $bug->assigned_staff) {
            $staff = User::where('role_id', '=', 2)->get();
            $priorities = Priority::all();

            $inputs = array_merge($inputs, ['staff' => $staff]);
            $inputs = array_merge($inputs, ['priorities' => $priorities]);
        }

        return view('bugs.show', $inputs);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bug $bug): Redirector|RedirectResponse
    {
        $bug->delete();

        return redirect('/bugs');
    }
}
