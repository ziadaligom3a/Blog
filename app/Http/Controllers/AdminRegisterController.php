<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\User;

class AdminRegisterController extends Controller
{


    public function index(){


        return view('register.create');

    }
    public function register(){


        $validate = request()->validate([

            'name' => 'required|min:3|max:255',
            'username' => 'required|min:5|max:255|unique',
            'email' => 'required|unique',
            'password' => 'required|min:5|max:255'
        ]);

        $validate['password'] = bcrypt($validate['password']);

        $user = User::create($validate);

        
        return redirect('/');


    }
}
