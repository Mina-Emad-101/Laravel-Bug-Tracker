<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create(): View|Redirector|RedirectResponse
    {
        return view('auth.login');
    }

    public function store(Request $request): Redirector|RedirectResponse
    {
        $attrs = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (! Auth::attempt($attrs)) {
            throw ValidationException::withMessages([
                'email' => 'Incorrect Email or Password',
            ]);
        }

        $request->session()->regenerate();

        return redirect('/bugs');
    }

    public function destroy(): Redirector|RedirectResponse
    {
        Auth::logout();

        return redirect('/');
    }
}
