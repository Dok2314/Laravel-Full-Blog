@extends('layouts.default')

@section('title', 'Создание статьи')

@section('content')
    <h2 class="alert alert-info" style="text-align: center">Создайте свою статью</h2>
    <div class="form-control">
        <form method="post" class="form-control" enctype="multipart/form-data">
            @csrf
            <div class="form-group mt-3">
                <label for="title">Название</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" class="form-control">
            </div>
            @error('title')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror
            <div class="form-group mt-3">
                <label for="image">Фото</label>
                <input type="file" name="image" id="image" value="{{ old('image') }}" class="form-control">
            </div>
            @error('image')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror
            <div class="form-group mt-3">
                <label for="article">Статья</label>
                <textarea name="article" id="article" class="form-control">{{ old('article') }}</textarea>
            </div>
            @error('article')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror
            <div class="form-group mt-3">
                <label for="category">Категория</label>
                <select name="category" id="category" class="form-control">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>
            @error('category')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror
            <button type="submit" class="btn btn-primary mt-3">Создать</button>
        </form>
    </div>
@endsection
