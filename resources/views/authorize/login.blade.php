@extends('layouts.default')

@section('title', 'Логин')

@section('content')
    <div class="form-control">
        <form action="{{ route('user.login') }}" method="post" class="form-control">
            @csrf
            <div class="form-group mt-3">
                <label for="">E-mail</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}">
            </div>
            @error('email')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror
            <div class="form-group mt-3">
                <label for="password">Пароль</label>
                <input type="password" id="password" name="password" class="form-control">
            </div>
            @error('password')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror
            <div class="form-group mt-3">
                <label for="remember">Запомнить меня?</label>
                <input type="checkbox" id="remember" name="remember">
            </div>
            <button type="submit" class="btn btn-primary mt-3">Войти</button>
        </form>
    </div>
@endsection
