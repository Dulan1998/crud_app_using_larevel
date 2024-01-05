<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\userController;

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

Route::get('/', function () {
    $posts =[];
    if(auth()-> check()){
        $posts = auth()->user()->usersCoolPosts()->latest()->get();
    }
    
    // $posts = Post::where('user_id', auth()->id())->get(); 
    return view('home',['posts'=>$posts]);
});
Route::post('/register',[userController::class,'register']);
Route::post('/logout',[userController::class,'logout']);
Route::post('/login',[userController::class,'login']);
//Blog post related route
Route::post('/create-post',[PostController::class,'createPost']);
Route::get('/edit-post/{post}',[PostController::class,'showEditScreen']);
Route::put('/edit-post/{post}',[PostController::class,'actuallyUpdatePost']);
Route::delete('/delete-post/{post}',[PostController::class,'deletePost']);