@extends('layouts.default')

@section('title', 'Редактирование категории')

@section('content')
    <div class="container">
        <form method="post" class="form-control">
            @csrf
            @method('PUT')
            <div class="form-group mt-3">
                <label for="title">Название категории</label>
                <input type="text" name="title" id="title" value="{{ $categoryArticle->title }}" class="form-control">
            </div>
            @error('title')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror
            <div class="form-group mt-3">
                <label for="description">Описание категории</label>
                <textarea name="description" id="description" class="form-control">{{ $categoryArticle->description }}</textarea>
            </div>
            @error('description')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror
            <button class="btn btn-primary mt-3" type="submit">Сохранить</button>
        </form>
    </div>
@endsection
