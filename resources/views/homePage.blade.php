@extends('layouts.default')

@section('title', 'Главная')

@section('content')
    <div class="container">
        <h1 class="alert alert-info" style="text-align: center">Блог DOK</h1>
        <div class="container">
            <h4>Категории:</h4>
            <nav>
                <ul style="display: flex; justify-content: space-between;">
                    @foreach($categories as $category)
                    <li style="list-style: none"><a style="text-decoration: none"
                    href="{{ route('category_article.articles-category', $category->slug) }}"
                        >{{ $category->title }}
                        </a>
                    </li>
                    @endforeach
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
                        <th scope="col">Категория</th>
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
                        <th scope="row">{{ $article->category->title }}</th>
                        <td><img src="{{ Storage::disk('images')->url($article->image) }}" width="130" height="100"></td>
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
                <h4>Выберите статью по тегу:</h4>
                    <nav>
                        <ul style="">
                            @foreach($tags as $tag)
                                <li><a href="{{ route('tags.articles', $tag->slug) }}">{{ $tag->title }}</a></li>
                            @endforeach
                        </ul>
                    </nav>
            </div>
        </div>
    </div>
@endsection
