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
}
