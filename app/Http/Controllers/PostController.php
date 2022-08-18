<?php

namespace App\Http\Controllers;
use \App\Models\category;
use \App\Models\Post;
use \App\Models\User;
use \App\Models\Comment;
use \App\Models\Admin;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Validation\Rule as ValidationRule;

class PostController extends Controller
{





    public function index(){
        
        $posts = Post::latest()->filter(request(['search']));
         return view('index',[
            
             
             'posts' => $posts->paginate(7)
         ]);
    }









    public function posts(Post $post){

        return view('Post.post',[

            'post' => $post
           
        ]);
    }
    




    public function category(category $category){

    $cate = $category->setRelation('posts', $category->posts()->paginate(7));
    // dd($cate->posts);
      return view('index',[

          'posts' => $cate->posts
          
          
      ]);


    
    }





    
    public function profile(User $author){

        return view('components.profile.profile',[

            'posts' => $author->posts
            
        ]);
    }

}
  