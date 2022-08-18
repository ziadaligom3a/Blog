<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class RegisterController extends Controller
{
    

    public function create(){
        return view('register.create'); 
    }

    public function store(){


        $validate = request()->validate([

            'name' => 'required|max:255|min:3',
            'username' => 'required|max:255|min:10|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|max:255|min:10'

        ]);

        $validate['password'] = bcrypt($validate['password']);

        $user =  User::create($validate);

        auth()->login($user);
        return redirect('/')->with('success','Your account has been created');
    }

}
