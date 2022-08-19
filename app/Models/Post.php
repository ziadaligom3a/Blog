<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \App\Models\Comment;
use Dotenv\Repository\Adapter\GuardedWriter;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $with = ['category','author'];

    public function category(){

        return $this->belongsTo(category::class);
    }


    public function comment(){

        return $this->hasMany(Comment::class);
        
    }
    public function author(){

        return $this->belongsTo(User::class,'user_id');
    }


    public function scopeFilter($query, array $filters){

        
        $query->when($filters['search'] ?? false,function($query,$search){

            $query->where('title','like', '%' . $search . '%')->orWhere('excerpt','like',"%$search%");
            

        });
                

    }

    public function make(){

        $post = Post::all();
        $post = $post->map(fn($p) => $p->id);
        $ca = new Comment;
        for($i = 0; $i < count($post); $i++){

            $ca->factory(5)->create([

                'post_id' => $post[$i]

            ]);
        }
    }


    

    }

