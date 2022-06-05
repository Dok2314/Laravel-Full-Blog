@extends('layouts.default')

@section('title', 'Пользователи')
@php
    /** @var \App\Models\User $user */
@endphp
@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Имя</th>
            <th scope="col">Роль</th>
            <th scope="col">E-Mail</th>
            <th scope="col">Дата Создания</th>
            <th scope="col" style="text-align: center">Действие</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <th scope="row">{{ $user->id }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->role->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at }}</td>
                <td style="text-align: center">
                    @if(!$user->deleted_at)
                    @can('users delete')
                        <form action="{{ route('users.delete', $user) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">
                                Удалить
                            </button>
                        </form>
                    @endcan
                    @can('users edit')
                            <a href="{{ route('users.edit', $user) }}"><button class="btn btn-primary">Редактировать</button></a>
                    @endcan
                    @else
                        <form action="{{ route('users.restore', $user) }}" method="post">
                            @csrf
                            @method('PUT')
                            <button class="btn btn-warning">
                                Восстановить Пользователя
                            </button>
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="mb-5">
        {{ $users->links('vendor.pagination.bootstrap-4') }}
    </div>
@endsection
