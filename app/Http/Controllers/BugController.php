<?php

namespace App\Http\Controllers;

use App\Models\Bug;
use App\Models\Priority;
use App\Models\Project;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class BugController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View|Redirector|RedirectResponse
    {
        $bugs = Bug::with(['project', 'priority', 'status'])->latest()->orderBy('status_id')->orderBy('priority_id');

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
            'bug_id' => ['required'],
            'staff_id' => ['nullable', 'exists:users,id'],
            'priority_id' => ['nullable', 'exists:priorities,id'],
        ]);

        $bug = Bug::find($request->get('bug_id'));

        if ($request->get('priority_id')) {
            $bug->priority_id = $request->get('priority_id');
            $bug->status_id = 2;
        }
        if ($request->get('staff_id')) {
            $bug->assigned_staff_id = $request->get('staff_id');
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
