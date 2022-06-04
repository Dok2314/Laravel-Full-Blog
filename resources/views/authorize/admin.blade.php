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
                <img src="{{ Auth::user()->getAvatarUrl() ?? '' }}" width="400" height="400" alt="">
            </div>
            <div class="col-md-6">
                <h2 style="text-align: center">Действия</h2>
               <div class="row">
                   <div class="col-md-6">
                       <div style="text-align: center">
                           <h2 style="text-align: center">Создание</h2>
                           @can('category create')
                           <a href="{{ route('category.create') }}"><button class="btn btn-info">Создать Категорию</button></a>
                           @endcan
                           @can('post create')
                           <a href="{{ route('post.create') }}"><button class="btn btn-info">Создать Пост</button></a>
                           @endcan
                           @can('users create')
                           <a href="{{ route('users.create') }}"><button class="btn btn-info mt-1">Создать Пользователя</button></a>
                           @endcan
                           @can('role create')
                           <a href="{{ route('roles.create') }}"><button class="btn btn-info mt-1">Создать Роль</button></a>
                           @endcan
                           @can('category_of_article create')
                               <a href="{{ route('category_article.create') }}"><button class="btn btn-info mt-1">Создать категорию статьи</button></a>
                           @endcan
                           @can('tag create')
                               <a href="{{ route('tags.create') }}"><button class="btn btn-info mt-1">Создать тег</button></a>
                           @endcan
                           @can('subscribe create')
                               <a href="{{ route('subscribe.create') }}"><button class="btn btn-info mt-1">Создать подписку</button></a>
                           @endcan
                       </div>
                   </div>
                   <div class="col-md-6">
                       <h2 style="text-align: center">Списки</h2>
                       @can('category view')
                       <a href="{{ route('category.index') }}"><button class="btn btn-primary">Категории</button></a>
                       @endcan
                       @can('post view')
                           <a href="{{ route('post.index') }}"><button class="btn btn-primary">Посты</button></a>
                       @endcan
                       @can('article view')
                       <a href="{{ route('articles.index') }}"><button class="btn btn-primary">Статьи</button></a>
                       @endcan
                       @can('role view')
                           <a href="{{ route('roles.index') }}"><button class="btn btn-primary mt-1">Роли</button></a>
                       @endcan
                       @can('users view')
                           <a href="{{ route('users.index') }}"><button class="btn btn-primary mt-1">Пользователи</button></a>
                       @endcan
                       @can('category_of_article view')
                           <a href="{{ route('category_article.index') }}"><button class="btn btn-primary mt-1">Категории статей</button></a>
                       @endcan
                       @can('tag view')
                           <a href="{{ route('tags.index') }}"><button class="btn btn-primary mt-1">Теги</button></a>
                       @endcan
                       @can('subscribe view')
                           <a href="{{ route('subscribe.index') }}"><button class="btn btn-primary mt-1">Подписки</button></a>
                       @endcan
                   </div>
               </div>
            </div>
        </div>
    </div>
@endsection
