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
            <hr><h2>Права</h2></hr>
            @foreach($permissions->groupBy(fn($permission) => \Str::before($permission->code, ' ')) AS $name => $items)
                <h3>{{ ucfirst($name) }}</h3>
                @foreach($items as $permission)
                    <input type="checkbox"
                           id="{{ $permission->name }}"
                           name="permissions[]"
                           value="{{ $permission->id }}"
                    ><label for="{{ $permission->name }}">{{ $permission->name }}</label><br>
                @endforeach
            @endforeach
            <button class="btn btn-primary mt-3" type="submit">Создать</button>
        </form>
    </div>
@endsection
