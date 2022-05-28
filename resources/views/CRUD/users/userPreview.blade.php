@extends('layouts.default')

@section('title', 'Результаты Поиска')

@section('content')
    <h1>Пользователь: <span style="color: green;">{{ $user->name }}</span></h1>
    <h4>Email: <span style="color: green;">{{ $user->email }}</span></h4>
    <div style="text-align: center">
        <h5>Фото:</h5>
        @if(!$user->getAvatarUrl())
            У данного пользователя пока нет фото
        @else
            <img src="{{ $user->getAvatarUrl() }}" width="400" height="400" alt="">
        @endif
    </div>
@endsection
