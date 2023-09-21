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

        User::create($attributes);

        return redirect('/');
    }
}
