@extends('layouts.default')

@section('title', 'Право')

@section('content')
    <div class="form-control">
        <form action="{{ route('permission.updatePermission', $permission->id) }}" method="post" class="form-control">
            @csrf
            <div class="form-group mt-3">
                <label for="name">Название</label>
                <input type="text" name="name" id="name" value="{{ $permission->name }}" class="form-control">
            </div>
            @error('name')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror
            <div class="form-group mt-3">
                <label for="code">Сокращение(Short Code)</label>
                <input type="text" name="code" id="code" value="{{ $permission->code }}" class="form-control">
            </div>
            @error('code')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror
            <button class="btn btn-warning mt-3">Обновить</button>
        </form>
    </div>
@endsection
