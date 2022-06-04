@extends('layouts.default')

@section('title', 'Создание подписки')

@section('content')
    <div class="container mt-3 mb-3">
        <form action="{{ route('subscribe.create') }}" method="post" class="form-control">
            @csrf
            <div class="form-group mt-3">
                <label for="subscribe">Название подписки</label>
                <input type="text" name="subscribe" id="subscribe" value="{{ old('subscribe') }}" class="form-control"><br>
            </div>
            @error('subscribe')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror
            <button class="btn btn-info" type="submit">Создать</button>
        </form>
    </div>
@endsection
