@extends('layouts.default')

@section('title', 'Главная')

@section('content')
    <div class="container">
        <h1 class="alert alert-info" style="text-align: center">Блог DOK</h1>
        <div class="container">
            <h4>Категории:</h4>
            <nav>
                <ul style="display: flex; justify-content: space-between;">
                    <li style="list-style: none"><a style="text-decoration: none" href="#">Category First</a></li>
                    <li style="list-style: none"><a style="text-decoration: none" href="#">Category First</a></li>
                    <li style="list-style: none"><a style="text-decoration: none" href="#">Category Second</a></li>
                    <li style="list-style: none"><a style="text-decoration: none" href="#">Category Third</a></li>
                    <li style="list-style: none"><a style="text-decoration: none" href="#">Category Fourth</a></li>
                </ul>
            </nav>
        </div>
        <div class="row">
            <div class="col-md-9">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Название</th>
                        <th scope="col">Фото</th>
                        <th scope="col">Статья</th>
                        <th scope="col">Обзор</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($articles as $article)
                    <tr>
                        <th scope="row">{{ $article->id }}</th>
                        <td>{{ $article->title }}</td>
                        <td><img src="{{ Storage::disk('images')->url($article->image) }}" width="100" height="100"></td>
                        <td>{{ $article->article }}</td>
                        <td><a href="{{ route('articles.preview', $article->id) }}"><button class="btn btn-info">Посмотреть</button></a></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="mb-5">
                    {{ $articles->links('vendor.pagination.bootstrap-4') }}
                </div>
            </div>
            <div class="col-md-3">
                Теги
            </div>
        </div>
    </div>
@endsection
