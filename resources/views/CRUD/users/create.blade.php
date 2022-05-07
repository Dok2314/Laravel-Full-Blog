@extends('layouts.default')

@section('title', 'Пользователи')

@section('content')
    <div class="form-control">
        <form action="{{ route('users.create') }}" method="post" class="form-control">
            @csrf
            @include('includes.components.input', ['label' => 'Имя', 'name' => 'name'])
            @include('includes.components.input', ['label' => 'E-mail', 'name' => 'email'])
            @include('includes.components.input', ['label' => 'Пароль', 'name' => 'password','type' => 'password'])
            <button class="btn btn-primary mt-3">Создать</button>
        </form>
    </div>
@endsection
