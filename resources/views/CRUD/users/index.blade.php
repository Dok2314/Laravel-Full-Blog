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
                    @can('users delete')
                        <a href=""><button class="btn btn-danger">Удалить</button></a>
                    @endcan
                    @can('users edit')
                            <a href="{{ route('users.edit', $user) }}"><button class="btn btn-primary">Редактировать</button></a>
                    @endcan
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="mb-5">
        {{ $users->links('vendor.pagination.bootstrap-4') }}
    </div>
@endsection
