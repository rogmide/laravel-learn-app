<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        // Validadion Handeling

        $attributes = request()->validate([
            'name' => 'required|max:255|min:5',
            'username' => 'required|max:255|min:3|unique:users,username',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:7|max:255'
        ]);

        // Encrypting Password

        $user = User::create($attributes);

        auth()->login($user);

        // This is a way to flash a piece of data to the session
        // session()->flash('success', 'Your account has been created.');

        // Short way to flash a piace of data to the session 
        return redirect('/')->with('success', 'Your account has been created.');
    }
}
