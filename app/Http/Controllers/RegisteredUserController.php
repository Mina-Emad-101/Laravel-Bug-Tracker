<?php

namespace App\Http\Controllers;

use App\Mail\AccountCreated;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    public function create(): View|Redirector|RedirectResponse
    {
        return view('auth.register');
    }

    public function store(Request $request): Redirector|RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'max:20'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'confirmed', Password::min(8)->letters()->numbers()],
        ]);

        $user = new User;
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = $request->get('password');
        $user->role_id = $request->get('role_id');

        $user->save();

        Mail::to($user->email)->send(new AccountCreated());

        Auth::login($user);

        return redirect('/bugs');
    }
}
