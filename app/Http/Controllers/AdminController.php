<?php

namespace App\Http\Controllers;
use \App\Models\Post;
use \App\Models\category;
use \App\Models\Comment;
use Exception;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class AdminController extends Controller
{
   public function index(){

    $post = Post::latest()->filter(request(['search']));
    
    return view('Admin.index',[

      'post' => $post->get()
    ]);

   }   
   
   
   public function Category(){
    try{

    $validate = request()->validate([

      'name' => 'required',
      'slug' => ['required',Rule::unique('categories','slug')]
    ]);

    category::create($validate);
    return redirect("/categories/{$validate['slug']}")->with('success','Your categories has been created');
  }catch(\Exception $e){

    throw ValidationException::withMessages(['errors'],$e->getMessage());
  }
}

   public function store(){

        
        try{
        
        $validate = request()->validate([

          'title' => 'required',
          'excerpt' => 'required',
          'slug' => ['required',Rule::unique('posts','slug')],
          'body' => 'required',
          'thumbnail' => 'required|image',
          'category_id' => ['required','numeric',Rule::exists('categories' ,'id')],
        

        ]);
        $validate['user_id'] = auth()->id();
        $validate['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

        dd($validate);
        Post::create($validate);
        return redirect('/posts/' . $validate['slug']);
      }catch(\Exception $e){
       
        throw ValidationException::withMessages(['errors',$e->getMessage()]);
       
      }


   }

  public function CategoryCreate(){
    
    try{
        $validate = request()->validate([


          'name' => ['required'],
          'slug' => ['required',Rule::unique('categories','slug')]

        ]);


        category::create($validate);

        return redirect("/categories/{$validate['slug']}")->with('success','Your Category has been created');
      }
      catch(\Exception $e){
      
        dd($e->getMessage());
      //  return back()->with('errors',$e->getMessage());

      }
        
     


  }

  public function Delete(Post $post){

    $id = $post->delete();
    session()->flash('msg', 'Changes Saved.' );
    return redirect()->back()->with('msg', 'Saved!'); 

  }

  public function Edit(Post $post){

    try{
    
      $validate = request()->validate([

        'title' => 'required',
        'excerpt' => 'required',
        'slug' => ['required',Rule::unique('posts','slug')->ignore($post->id)],
        'body' => 'required',
        'thumbnail' => 'image',
        'category_id' => ['required','numeric',Rule::exists('categories' ,'id')],
      

      ]);
      $validate['user_id'] = auth()->id();
      if(isset($validate['thumbnail'])):
      $validate['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
      
      endif;
      $post->update($validate);
      return redirect('/posts/' . $validate['slug']);
    }catch(\Exception $e){
     
      throw ValidationException::withMessages(['errors',$e->getMessage()]);
     
    }


  }
}
