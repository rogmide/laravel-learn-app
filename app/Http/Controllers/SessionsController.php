<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    //

    public function destroy()
    {
        auth()->logout();
        return redirect('/')->with('success', 'GoodBye');
    }

    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        // Validate the request
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Authenticate

        if (auth()->attempt($attributes)) {
            # code...

            // clean the session
            session()->regenerate();
            return redirect('/')->with('success', 'Welcome Back');
        } else {
            return back()
                ->withInput()
                ->withErrors(['email' => 'Your provided credentials could not be verified']);
        }
    }
}
