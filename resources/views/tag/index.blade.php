@extends('layouts.default')

@section('title', 'Стати тега')

@section('content')
    <h2 class="alert alert-info" style="text-align: center;">
        Статьи тега:
        <span style="color: green;">
            <strong>
            "{{ $tag->title }}"
            </strong>
        </span></h2>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Название</th>
            <th scope="col">Категория</th>
            <th scope="col">Теги</th>
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
                <td style="color: green"><b>{{ $article->category->title }}</b></td>
                <td style="color: green">
                    @foreach($article->tags as $tag)
                        {{ $tag->title }}
                    @endforeach
                </td>
                <td><img src="{{ Storage::disk('images')->url($article->image) }}" width="130" height="100"></td>
                <td>{{ $article->article }}</td>
                <td><a href="{{ route('articles.preview', $article) }}"><button class="btn btn-info">Посмотреть</button></a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
