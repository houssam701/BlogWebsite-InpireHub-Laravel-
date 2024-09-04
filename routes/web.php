<?php

use App\Models\ReadLater;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\forgetPassword;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\postController;
use App\Http\Controllers\commentController;
use App\Http\Controllers\ReadLaterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/',[MainController::class,"homePage"])->middleware('auth');
Route::get('/login',[AuthController::class,"loginPage"])->middleware('guest')->name('login');
Route::get('/signup',[AuthController::class,"signUpPage"])->middleware('guest');
Route::get('/about',[MainController::class,"aboutPage"])->middleware('auth');
Route::get('/author',[MainController::class,"authorPage"])->middleware('auth');
Route::get('/post',[MainController::class,"postPage"])->middleware('auth');

Route::get('/newpost',[MainController::class,"newPostPage"])->middleware('auth');
Route::post('/newpost',[postController::class,"createPost"]);
Route::get('/post/{post}',[postController::class,"postPage"]);

Route::get('/post/delete/{post}',[postController::class,"deletePost"])->middleware("can:delete,post");
Route::post('/post/comment/{post}',[commentController::class,"createComment"])->middleware('auth');

Route::get('/author/{user}',[postController::class,"author"])->middleware('auth');

Route::post('/search',[MainController::class,"searchPost"]);
// Route::get('/search',[MainController::class,"searchPost"]);

Route::get('/editAuthor/{user}',[MainController::class,'editAuthorPage']);
Route::post('editProfile/{user}',[MainController::class,'editProfile']);

Route::Post('/readLater',[ReadLaterController::class,"readLater"]);
Route::get('/savedPost',[ReadLaterController::class,"savedPost"])->middleware('auth');

Route::post('/likePost',[LikeController::class,"likePost"])->middleware('auth');

Route::post('/signup',[AuthController::class,"signUp"])->middleware('guest'); 
Route::post('/login',[AuthController::class,"login"])->middleware('guest'); 

Route::get('/logout',[AuthController::class,"logout"])->middleware('auth');


Route::get('/forget',[forgetPassword::class,'forgetPage']);
Route::post('/forgetPassword',[forgetPassword::class,'forgetPassword']);
Route::get('/reset/{token}',[forgetPassword::class,'resetPage'])->name('reset.password');
Route::post('/resetPassword',[forgetPassword::class,'resetPassword']);