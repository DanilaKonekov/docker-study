<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
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
    public function show($post){
        return "Страница просмотра поста {$post}";
    }
    public function edit($post){
        return "Страница изменения поста {$post}";
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
