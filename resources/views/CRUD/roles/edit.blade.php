@extends('layouts.default')

@section('title', 'Редактирование')
@php /** @var \App\Models\Role $role */ @endphp
@php /** @var \Illuminate\Database\Eloquent\Collection|\App\Models\Permission[] $permissions */ @endphp
@section('content')
    <div class="form-control">
        <form method="post" class="form-control">
            @csrf
            @method('PUT')
            @include('includes.components.input', ['label' => 'Название', 'name' => 'name', 'value' => $role->name ])
            <hr><h2>Права</h2></hr>
            @foreach($permissions->groupBy(fn($permission) => \Str::before($permission->code, ' ')) AS $name => $items)
                <h3>{{ ucfirst($name) }}</h3>
                @foreach($items as $permission)
                    <input type="checkbox"
                           name="permissions[]"
                           value="{{ $permission->id }}"
                        {{ $role->permissions->contains($permission) ? 'checked' : '' }}
                    >{{ $permission->name }}<br>
                @endforeach
            @endforeach
            <button class="btn btn-primary mt-3">Сохранить</button>
        </form>
    </div>
@endsection
