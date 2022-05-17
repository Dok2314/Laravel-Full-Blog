@extends('layouts.default')

@section('title', 'Создание тега')

@section('content')
    <div class="container">
        <form method="post" class="form-control">
            @csrf
            <div class="form-group mt-3">
                <label for="title">Тег</label>
                <input type="text" name="title" id="title" value="#{{ old('title') }}" class="form-control">
            </div>
            @error('title')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror
            <div class="form-group mt-3">
                <label for="description">Описание тега</label>
                <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
            </div>
            @error('description')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror
            <button class="btn btn-primary mt-3">Создать</button>
        </form>
    </div>
@endsection
