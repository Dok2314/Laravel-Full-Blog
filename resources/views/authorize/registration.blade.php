@extends('layouts.default')

@section('title', 'Регистрация')

@section('content')
    <div class="form-control">
        <form action="{{ route('user.registration') }}" method="post" class="form-control" enctype="multipart/form-data">
            @csrf
            <div class="form-group mt-3">
                <label for="name">Имя</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
            </div>
            @error('name')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror
            <div class="form-group mt-3">
                <label for="email">E-mail</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
            </div>
            @error('email')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror
            <div class="form-group mt-3">
                <label for="avatar">Аватар</label>
                <input type="file" name="avatar" id="avatar" class="form-control">
            </div>
            @error('avatar')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror
            <div class="form-group mt-3">
                <label for="password">Пароль</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            @error('password')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror
            <div class="form-group mt-3">
                <label for="password-confirm">Повторите пароль</label>
                <input type="password" name="password-confirm" id="password-confirm" class="form-control">
            </div>
            @error('password-confirm')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror
            <button class="btn btn-primary mt-3">Зарегестрироваться</button>
        </form>
    </div>
@endsection
