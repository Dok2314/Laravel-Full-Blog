@extends('layouts.default')

@section('title', 'Право')

@section('content')
    <div class="form-control">
        <form action="{{ route('permission.createPermission') }}" method="post" class="form-control">
            @csrf
            <div class="form-group mt-3">
                <label for="name">Название</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
            @error('name')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
            <div class="form-group mt-3">
                <label for="code">Сокращение(Short Code)</label>
                <input type="text" name="code" id="code" class="form-control">
            </div>
            @error('code')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror
            <button class="btn btn-primary mt-3">Создать</button>
        </form>
    </div>
@endsection
