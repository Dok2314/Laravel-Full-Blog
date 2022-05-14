@extends('layouts.default')

@section('title', 'Все Статьи')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Название</th>
            <th scope="col">Фото</th>
            <th scope="col">Статья</th>
            <th scope="col">Категория</th>
            <th scope="col" style="text-align: center">Действие</th>
        </tr>
        </thead>
        <tbody>
        @foreach($articles as $article)
            <tr>
                <th scope="row">{{ $article->id }}</th>
                <th scope="row">{{ $article->title }}</th>
                <td><img src="{{ Storage::disk('images')->url($article->image) }}" width="150" height="150"></td>
                <td>{{ $article->article }}</td>
                <td>{{ $article->category->title }}</td>
                <td>
                    <form action="{{ route('articles.delete', $article) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Удалить</button>
                    </form>
                    <a href="{{ route('articles.edit', $article) }}">
                        <button class="btn btn-primary">
                            Редактировать
                        </button>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="mb-5">
{{--         $categories->links('vendor.pagination.bootstrap-4') --}}
    </div>
@endsection
