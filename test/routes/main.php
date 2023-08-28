<?php

use App\Http\Controllers\TestController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Posts\CommentController;
use Illuminate\Support\Facades\Route;


Route::resource('product_cards', ProductCardController::class);
Route::resource('source_items', SourceItemController::class);


Route::get('/product-cards', 'ProductCardController@index');


//  должен быть в самом низу
Route::fallback(function (){
    return 'Fallback';
});
