@extends('layouts.default')

@section('title', 'Профиль Пользователя')

@section('content')
    <div class="container mt-5 mb-5">
        <div class="col-md-8">
            <h3>Выберите подписку(и)</h3>
            <div class="container">
                <form action="{{ route('subscribe.userSubscribe') }}" method="post" class="form-control">
                    @csrf
                    @foreach($subscribes as $subscribe)
                        <div class="form-group">
                            <input type="checkbox"
                                   id="{{ $subscribe->name }}"
                                   name="subscribes[]"
                                   value="{{ $subscribe->id }}"
                                {{ Auth::user()->subscribes->contains($subscribe) ? 'checked' : '' }}
                            ><label for="{{ $subscribe->name }}">{{ $subscribe->name }}</label><br>
                        </div>
                    @endforeach
                    <button class="btn btn-info mt-3">Сохранить</button>
                </form>

            </div>
        </div>
        <div class="col-md-4">

        </div>
    </div>
@endsection
