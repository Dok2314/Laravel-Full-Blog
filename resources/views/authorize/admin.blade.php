@extends('layouts.default')

@section('title', 'Админка')

@section('content')
    <h1>Здравствуйте {{ Auth::user()->name }}</h1>
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    <div class="alert alert-info">
        <img src="{{ Auth::user()->getAvatarUrl() }}" alt="">
    </div>
@endsection
