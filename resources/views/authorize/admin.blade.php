@extends('layouts.default')

@php
$name = Auth::user()->name;
@endphp

@section('title', "Админка $name")

@section('content')
    <h1>Здравствуйте {{ Auth::user()->name }}</h1>
    <div class="alert alert-info">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ Auth::user()->getAvatarUrl() }}" width="400" height="400" alt="">
            </div>
            <div class="col-md-6">
                <h2 style="text-align: center">Действия</h2>
               <div class="row">
                   <div class="col-md-6">
                       <div style="text-align: center">
                           <h2 style="text-align: center">Создание</h2>
                           <a href="{{ route('CRUD.categoryCreateView') }}"><button class="btn btn-info">Создать Категорию</button></a>
                           <a href="{{ route('post.postCreateView') }}"><button class="btn btn-info">Создать Пост</button></a>
                           <a href="{{ route('users.create') }}"><button class="btn btn-info mt-1">Создать Пользователя</button></a>
                           <a href="{{ route('roles.create') }}"><button class="btn btn-info mt-1">Создать Роль</button></a>
                       </div>
                   </div>
                   <div class="col-md-6">
                       <h2 style="text-align: center">Списки</h2>
                       <a href="{{ route('CRUD.categoryAll') }}"><button class="btn btn-primary">Все категории</button></a>
                       <a href="{{ route('post.postAll') }}"><button class="btn btn-primary">Все посты</button></a>
                       <a href="{{ route('roles.index') }}"><button class="btn btn-primary mt-1">Роли</button></a>
                       <a href="{{ route('users.index') }}"><button class="btn btn-primary mt-1">Пользователи</button></a>
                   </div>
               </div>
            </div>
        </div>
    </div>
@endsection
