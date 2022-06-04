@extends('layouts.default')


@section('title', 'Подписки')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Название</th>
            <th scope="col">Создана</th>
            <th scope="col">Обновлена</th>
            <th scope="col">Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($subscribes as $subscribe)
        <tr>
            <th scope="row">{{ $subscribe->id }}</th>
            <td>{{ $subscribe->name }}</td>
            <td>{{ $subscribe->created_at }}</td>
            <td>{{ $subscribe->updated_at }}</td>
            <td>
                <form action="{{ route('subscribe.delete', $subscribe) }}" method="post">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger">Удалить</button>
                </form>
                <a href="{{ route('subscribe.edit', $subscribe) }}"><button class="btn btn-primary">Редактировать</button></a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <div class="mt-3">
        {{ $subscribes->links('vendor.pagination.bootstrap-4') }}
    </div>
@endsection
