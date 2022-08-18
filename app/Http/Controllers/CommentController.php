<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Post;

class CommentController extends Controller
{
   public function AddComment(Post $post){


    request()->validate([
       
        'body' => 'required'
        
    ]);
    
    $post->comment()->create([

        'user_id' => auth()->id(),
        'body' => request('body')
    ]);

    return back()->with('success','Your comment has been posted');
    
   }
}
