@extends('layouts.default')

@section('title', 'Профиль Пользователя')

@section('content')
    <div class="container mt-5 mb-5">
        <div class="col-md-8">
            <a href="{{ route('subscribe.view') }}"><button class="btn btn-info">Подписки</button></a>
        </div>
        <div class="col-md-4">

        </div>
    </div>
@endsection
