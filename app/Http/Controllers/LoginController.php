<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function index(){

        return view('Login.Login');
    }

    public function login(){


        $validate = request()->validate([

            'username' => 'required|:min:4|max:255',
            'password' => 'required|min:4|max:255'
        ]);

        // $validate['password'] = bcrypt($validate['password']);

        if(!auth()->attempt($validate)):
            throw ValidationException::withMessages(['username' => 'Your credentials are incorrect!']);
            
        endif;
        session()->regenerate();
        return redirect('/')->with('success','You have been logged in!');

    }
}
