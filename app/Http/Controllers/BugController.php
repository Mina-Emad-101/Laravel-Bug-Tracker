<?php

namespace App\Http\Controllers;

use App\Models\Bug;
use App\Models\Project;
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
    public function index(): View
    {
        $bugs = Bug::with(['project', 'priority', 'status'])->latest()->orderBy('status_id')->orderBy('priority_id');

        if (Auth::user()->role_id == 1) {
            $bugs = $bugs->where(['status_id' => 1]);
        } elseif (Auth::user()->role_id == 2) {
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
            'project' => ['required'],
            'description' => ['required', 'max:255'],
            'screenshot' => ['required', 'image'],
        ]);

        $newBug = Bug::create([
            'project_id' => $request->get('project'),
            'status_id' => 1,
            'description' => $request->get('description'),
            'reporter_id' => $request->get('reporter'),
            'screenshot' => $request->file('screenshot')->store('screenshots', 'public'),
            'created_at' => now(),
        ]);

        return redirect('/bugs/'.$newBug->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Bug $bug): View
    {
        return view('bugs.show', ['bug' => $bug]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bug $bug): void
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bug $bug): void
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bug $bug): Redirector|RedirectResponse
    {
        $bug->delete();

        return redirect(to: '/bugs');
    }
}
