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
                <img src="{{ Auth::user()->getAvatarUrl() }}" alt="">
            </div>
            <div class="col-md-6">
                <h2 style="text-align: center">Действия</h2>
               <div class="row">
                   <div class="col-md-6">
                       <div style="text-align: center">
                           <h2 style="text-align: center">Создание</h2>
                           <a href="{{ route('CRUD.categoryCreateView') }}"><button class="btn btn-info">Создать Категорию</button></a>
                           <a href=""><button class="btn btn-info">Создать Пост</button></a>
                       </div>
                   </div>
                   <div class="col-md-6">
                       <h2 style="text-align: center">Списки</h2>
                       <a href="{{ route('CRUD.categoryAll') }}"><button class="btn btn-primary">Все категории</button></a>
                       <a href=""><button class="btn btn-primary">Все посты</button></a>
                   </div>
               </div>
            </div>
        </div>
    </div>
@endsection
