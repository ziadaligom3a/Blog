<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use \App\Models\Post;
use \App\Models\category;
use \App\Models\User;
use \App\Http\Controllers\PostController;
use \App\Http\Controllers\RegisterController;
use \App\Http\Controllers\SessionDestroyerController;
use \App\Http\Controllers\LoginController;
use \App\Http\Controllers\CommentController;
use \App\Http\Controllers\NewslettersController;
use \App\Services\Newsletter;
use \App\Http\Controllers\TestController;
use \App\Http\Controllers\AdminRegisterController;
use App\Http\Controllers\NewsletterController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::post('/newsletters',NewsletterController::class);



// Route::get('test', TestController::class);

Route::get('/',[PostController::class,'index']);

Route::get('posts/{post:slug}',[PostController::class,'posts']);

Route::get('/categories/{category:slug}',[PostController::class,'category']);

Route::get('/author/{author}',[PostController::class,'profile'])->name('users');

Route::middleware('guest')->group(function(){
    Route::get('/register',[RegisterController::class,'create']);
    Route::post('/register',[RegisterController::class,'store']);
    Route::get('login',[LoginController::class,'index']);
    Route::post('login',[LoginController::class,'login']);
});

Route::middleware('auth')->group(function(){
    Route::post('/posts/{post:slug}/comment',[CommentController::class,'AddComment']);
    Route::post('logout',[SessionDestroyerController::class,'destroy']);

});

Route::middleware('MustBeAdmin')->group(function(){

    Route::get('/admin/Dashboard',[AdminController::class,'index']);
    Route::post('/admin/posts',[AdminController::class,'store']);
    Route::post('/admin/category/create',[AdminController::class,'Category']);
    Route::post('/admin/categories',[AdminController::class,'CategoryCreate']);
    Route::get('/admin/Delete/{post}',[AdminController::class,'Delete']);
    Route::patch('/admin/Edit/{post}',[AdminController::class,'Edit']);
});
