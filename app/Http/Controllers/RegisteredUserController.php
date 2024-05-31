<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class RegisteredUserController extends Controller
{
    public function create(): View
    {
        return view('auth.register');
    }

    public function store(): Redirector|RedirectResponse
    {
        $request = request();
        $user = new User;
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = $request->get('password');
        $user->role_id = $request->get('role_id');

        $user->save();

        return redirect('/bugs');
    }
}
