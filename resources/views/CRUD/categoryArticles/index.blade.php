@extends('layouts.default')

@section('title', 'Все категории статей')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Название</th>
            <th scope="col">Описание</th>
            <th scope="col">Дата Создания</th>
            <th scope="col">Последнее Обновление</th>
            <th scope="col" style="text-align: center">Действие</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categoryArticles as $categoryArticle)
            <tr>
                <th scope="row">{{ $categoryArticle->id }}</th>
                <td>{{ $categoryArticle->title }}</td>
                <td>{{ $categoryArticle->description }}</td>
                <td>{{ $categoryArticle->created_at }}</td>
                <td>{{ $categoryArticle->updated_at }}</td>
                <td>
                    <form action="{{ route('category_article.delete', $categoryArticle) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="alert alert-danger">Удалить</button>
                    </form>
                    <a href="{{ route('category_article.edit', $categoryArticle) }}">
                        <button class="alert alert-primary">
                            Редактировать
                        </button>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="mb-5">
        {{ $categoryArticles->links('vendor.pagination.bootstrap-4') }}
    </div>
@endsection
