@extends('layouts.default')

@section('title', 'Создание подписки')

@section('content')
    <div class="container mt-3 mb-3">
        <form action="{{ route('subscribe.edit',$subscribe) }}" method="post" class="form-control">
            @csrf
            @method('PUT')
            <div class="form-group mt-3">
                <label for="subscribe">Название подписки</label>
                <input type="text" name="subscribe" id="subscribe" value="{{$subscribe->name}}" class="form-control"><br>
            </div>
            @error('subscribe')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror
            <button class="btn btn-warning" type="submit">Обновить</button>
        </form>
    </div>
@endsection
