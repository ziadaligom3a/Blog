<?php

namespace App\Models;
use \App\Models\SayHello;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    public function Admin(SayHello $say){

        // $say = new SayHello;
        dd($say->SayHello());
    }

}
