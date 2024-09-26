<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\RegisterEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function store()
    {
        $validated = request()->validate([
            'name' => 'required|min:3|max:40',
            'email' => 'required|email|unique:users,email',
<<<<<<< HEAD
            'password' => 'required|confirmed|min:5',
=======
            'password' => 'required|confirmed|min:8',
>>>>>>> d396b91257532fbd839408e4a71c7c89206b9bc6
        ]);

        $user = User::create(
            [
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
            ]
        );

        // Bisa tambahkan method cc dan bcc
        Mail::to($user->email)->send(new RegisterEmail($user));

        return redirect()->route('dashboard')->with('success', 'Account created successfully!');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function authenticate()
    {
        $validated = request()->validate([
            'email' => 'required|email',
<<<<<<< HEAD
            'password' => 'required|min:5',
=======
            'password' => 'required|min:8',
>>>>>>> d396b91257532fbd839408e4a71c7c89206b9bc6
        ]);

        if (auth()->attempt($validated)) {

            // Membuat session baru
            request()->session()->regenerate();

            return redirect()->route('dashboard')->with('success', 'Logged in successfully');
        }

        return redirect()->route('login')->withErrors([
            'email' => "No matching user found with the provided email and password",
        ]);
    }

    public function logout()
    {
        auth()->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route("dashboard")->with("success", "Logout Successfully");
    }
}