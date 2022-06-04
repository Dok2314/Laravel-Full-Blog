@extends('layouts.default')

@section('title', 'Редактирование')

@section('content')
    <div class="form-control">
        <form method="post" class="form-control">
            @csrf
            @method('PUT')
            @include('includes.components.input', ['label' => 'Имя', 'name' => 'name', 'value' => $user->name ])
            @include('includes.components.input', ['label' => 'E-emails', 'name' => 'email', 'value' => $user->email ])
            @include('includes.components.input', ['label' => 'Новый Пароль', 'name' => 'password','type' => 'password' ])

            <select name="role_id" class="form-control mt-3">
                @foreach($roles AS $role)
                    <option value="{{ $role->id }}" {{ $user->role->is($role) ? 'selected' : '' }}>{{ $role->name }}</option>
                @endforeach
            </select>

            <button class="btn btn-primary mt-3">Сохранить</button>
        </form>
    </div>
@endsection
