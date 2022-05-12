<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required', 'min:3', 'max:255'],
            'image' => ['required', 'image', 'max:10000', 'mimes:jpg,png,jpeg,gif,svg'],
            'article' => ['required', 'min:5', 'max:500'],
//            'category' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Поле Название должно быть заполнено!',
            'title.min' => 'Поле Название должно содержать не менее 3 символов!',
            'title.max' => 'Поле Название должно содержать не более 255 символов!',
            'image.required' => 'Поле Фото должно быть заполнено!',
            'image.image' => 'Вы выбрали не фото!',
            'image.max' => 'Фото должно весить не более 10МБ!',
            'image.mimes' => 'Выбран неверный тип Фото!',
            'article.required' => 'Поле Статья должно быть заполнено!',
            'article.min' => 'Поле Статья должно содержать не менее 5 символов!',
            'article.max' => 'Поле Статья должно содержать не более 500 символов!',
            'category.required' => 'Выберите категорию!'
        ];
    }
}
