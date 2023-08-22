<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(){
        return 'Страница списков постов';
    }

    public function create(){
        return 'Страница создание поста';
    }
    public function store(){
        return 'Запрос создание поста';
    }
    public function show(){
        return "Страница просмотра поста ";
    }
    public function edit($post, $comment){
        return "Изменить комметнарий {$comment} (пост {$post})";
    }
    public function update(){
        return 'Запрос изменение поста';
    }
    public function delete(){
        return 'Запрос удаление поста';
    }
    public function like(){
        return 'Лайк + 1';
    }
}

