<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // Show Register Form
    public function create()
    {
        return view('users.register');
    }

    // Store New User
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'email' => ['email', 'required', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', 'min:8']
        ]);

        // Add Default User Name
        $formFields['name'] = $formFields['email'];

        // Hash Password
        $formFields['password'] = bcrypt($formFields['password']);

        // Create User
        $user = User::create($formFields);

        // Login
        auth()->login($user);

        return redirect('/');
    }

    // Show Login Form
    public function login()
    {
        return view('users.login');
    }

    // User Authenticate / Login
    public function authenticate(Request $request)
    {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if(auth()->attempt($formFields)) {
            $request->session()->regenerate();
            return redirect('/urls');
        }

        return back()->withErrors(['password' => 'Invalid Credentials']);
    }

    // User Logout
    public function logout(Request $request)
    {
        auth()->logout();

        // It is recommended to invalidate all sessions and regenerate token too
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
