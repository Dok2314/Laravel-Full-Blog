@extends('layouts.default')

@section('title', 'Пользователи')

@section('content')
    <div class="form-control">
        <form action="{{ route('users.create') }}" method="post" class="form-control">
            @csrf
            @include('includes.components.input', ['label' => 'Имя', 'name' => 'name'])
            @error('name')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
            @include('includes.components.input', ['label' => 'E-emails', 'name' => 'email'])
            @error('email')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror
            <label for="role" class="mt-3">Выберите Роль</label>
            <select name="role_id" id="role" class="form-control">
                @foreach($roles as $role)
                <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>
            @include('includes.components.input', ['label' => 'Пароль', 'name' => 'password','type' => 'password'])
            @error('password')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror
            @include('includes.components.input', ['label' => 'Повторите Пароль', 'name' => 'password-confirm','type' => 'password'])
            @error('password-confirm')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror
            <button class="btn btn-primary mt-3">Создать</button>
        </form>
    </div>
@endsection
