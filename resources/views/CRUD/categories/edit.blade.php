@extends('layouts.default')

@section('title', 'Категория')

@section('content')
    <div class="form-control">
        <form method="post" class="form-control">
            @csrf
            @method('PUT')
            <div class="form-group mt-3">
                <label for="title">Название</label>
                <input type="text" name="title" id="title" value="{{ $category->title }}" class="form-control">
            </div>
            @error('title')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror
            <div class="form-group mt-3">
                <label for="description">Описание Категории</label>
                <textarea name="description" id="description" class="form-control">{{ $category->description }}</textarea>
            </div>
            @error('description')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror
            <button class="btn btn-warning mt-3" type="submit">Сохранить</button>
        </form>
    </div>
@endsection
