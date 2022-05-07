@extends('layouts.default')

@section('title', 'Роли')
@php /** @var \App\Models\Role $role */ @endphp
@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Имя</th>
            <th scope="col">Дата Создания</th>
            <th scope="col" style="text-align: center">Действие</th>
        </tr>
        </thead>
        <tbody>
        @foreach($roles as $role)
            <tr>
                <th scope="row">{{ $role->id }}</th>
                <td>{{ $role->name }}</td>
                <td>{{ $role->created_at }}</td>
                <td style="text-align: center">
                    @can('role delete')
                        <form action="{{ route('roles.delete', $role) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger">Удалить</button>
                        </form>
                    @endcan
                    @can('role edit')
                            <a href="{{ route('roles.edit', $role) }}"><button class="btn btn-primary">Редактировать</button></a>
                    @endcan
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
