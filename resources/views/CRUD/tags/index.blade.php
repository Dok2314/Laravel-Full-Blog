@extends('layouts.default')

@section('title', 'Создание тега')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Название</th>
            <th scope="col">Описание</th>
            <th scope="col" style="text-align: center">Действие</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tags as $tag)
            <tr>
                <th scope="row">{{ $tag->id }}</th>
                <td>{{ $tag->title }}</td>
                <td>{{ $tag->description }}</td>
                <td>
                    <form method="post" action="{{ route('tags.delete', $tag) }}">
                        @csrf
                        @method('DELETE')
                        <button class="alert alert-danger">Удалить</button>
                    </form>
                    <a href="{{ route('tags.edit', $tag) }}"><button class="btn btn-primary">Редактировать</button></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="mb-5">
        {{ $tags->links('vendor.pagination.bootstrap-4') }}
    </div>
@endsection
