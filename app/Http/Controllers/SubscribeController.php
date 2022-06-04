<?php

namespace App\Http\Controllers;

use App\Events\NewCreatedArticle;
use App\Http\Requests\SubscribeRequest;
use App\Models\Article;
use App\Models\Subscribe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SubscribeController extends Controller
{
    public function index()
    {
        $subscribes = Subscribe::paginate(10);

        return view('CRUD.subscribes.index', compact('subscribes'));
    }

    public function create()
    {
        return view('CRUD.subscribes.create');
    }

    public function store(SubscribeRequest $request)
    {
        $subscribe_name = $request->input('subscribe');

        $subscribe = new Subscribe([
            'name' => $subscribe_name,
            'code' => Str::slug($subscribe_name, '_'),
        ]);

        if(!$subscribe->save()) {
            return redirect()->back()->with('error', 'Не удалось создать подписку!');
        }

        return redirect()->route('subscribe.edit', $subscribe)->with('success', sprintf(
           'Подписка %s, успешно создана!',
           $subscribe->name
        ));
    }

    public function edit(Subscribe $subscribe)
    {
        return view('CRUD.subscribes.edit', compact('subscribe'));
    }

    public function update(Subscribe $subscribe, SubscribeRequest $request)
    {
        $new_name = $request->input('subscribe');
        $subscribe->name = $new_name;

        $subscribe->save();

        return redirect()->route('subscribe.edit', $subscribe)->with('success', 'Подписка успешно обновлена!');
    }

    public function destroy(Subscribe $subscribe)
    {
        $subscribe->delete();

        return redirect()->back()->with('success', 'Подписка успешно удалена!');
    }

    public function subscribes(Request $request)
    {
        $user = Auth::user();

        $user->subscribes()->sync($request->subscribes);

        return redirect()->back()->with('success', 'Подписки успешно сохранены!');
    }
}
