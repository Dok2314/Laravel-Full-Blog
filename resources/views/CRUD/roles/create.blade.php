@extends('layouts.default')

@section('title', 'Роли')

@section('content')
    <div class="form-control">
        <form action="{{ route('roles.create') }}" method="post" class="form-control">
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
            @foreach($permissions as $permission)
                <input type="checkbox"
                       name="permissions[]"
                       value="{{ $permission->id }}"
                >{{ $permission->name }}<br>
            @endforeach
            <button class="btn btn-primary mt-3" type="submit">Создать</button>
        </form>
    </div>
@endsection
