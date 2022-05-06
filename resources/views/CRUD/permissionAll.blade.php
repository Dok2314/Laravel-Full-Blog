@extends('layouts.default')

@section('title', 'Все Права')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Название</th>
            <th scope="col">Сокращение (Short Code)</th>
            <th scope="col" style="text-align: center">Действие</th>
        </tr>
        </thead>
        <tbody>
        @foreach($permissions as $permission)
            <tr>
                <th scope="row">{{ $permission->id }}</th>
                <td>{{ $permission->name }}</td>
                <td>{{ $permission->code }}</td>
                <td style="text-align: center">
                    <a href="{{ route('permission.deletePermission', $permission->id) }}"><button class="btn btn-danger">Удалить</button></a>
                    <a href="{{ route('permission.previewPermission', $permission->id) }}"><button class="btn btn-primary">Редактировать</button></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
