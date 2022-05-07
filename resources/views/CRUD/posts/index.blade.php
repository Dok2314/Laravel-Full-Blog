@extends('layouts.default')

@section('title', 'Посты')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Название</th>
            <th scope="col">Пост</th>
            <th scope="col">Создатель</th>
            <th scope="col" style="text-align: center">Действие</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>
                <th scope="row">{{ $post->id }}</th>
                <td>{{ $post->title }}</td>
                <td>{{ $post->post }}</td>
                <td>
                    {{ $post->user->name }}
                </td>
                <td style="text-align: center">
                    @can('post delete')
                        <form action="{{ route('post.delete', $post) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger">Удалить</button>
                        </form>
                    @endcan
                    @can('post edit')
                        <a href="{{ route('post.edit', $post->id) }}"><button class="btn btn-primary">Редактировать</button></a>
                    @endcan
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="mb-5">
        {{ $posts->links('vendor.pagination.bootstrap-4') }}
    </div>
@endsection
