<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;


class SessionsController extends Controller
{

    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
            ]);

        if(auth()->attempt($attributes))
        {
            session()->regenerate();
            return redirect('/')->with('success', 'Welcome back!');
        }

        return back()->withInput()->withErrors(['email' => 'Your credentials could not be verified']);

        //or another way
        // throw ValidationException::withMessages('Not found');
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Goodbye!');
    }

}
