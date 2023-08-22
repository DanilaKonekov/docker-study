<?php

use App\Http\Controllers\TestController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Posts\CommentController;
use Illuminate\Support\Facades\Route;


Route::view('/', 'welcome');

Route::redirect('/home', '/');

// Сначала команду в контейнере для создания новго контролера php artisan make:controller TestController
Route::get('/test', \App\Http\Controllers\TestController::class);

Route::get('register', [RegisterController::class, 'index'])->name('register');
Route::post('register', [RegisterController::class, 'store'])->name('register.store');

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'store'])->name('login.store');
Route::get('login/{user}/confirmation', [LoginController::class, 'confirmation'])->name('login.confirmation');
Route::post('login/{user}/confirm', [LoginController::class, 'confirm'])->name('login.confirm');



//Route::resources('posts',PostController::class)->only([
//  'index', 'show',
//]);

Route::resource('posts/{post}/comments', CommentController::class);





//  должен быть в самом низу
Route::fallback(function (){
    return 'Fallback';
});
