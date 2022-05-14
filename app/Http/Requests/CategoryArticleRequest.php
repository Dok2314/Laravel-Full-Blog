<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryArticleRequest extends FormRequest
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
            'description' => ['required', 'min:5', 'max:500']
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Поле Название должно быть заполнено!',
            'title.min' => 'Поле Название должно содержать не менее 3 символов!',
            'title.max' => 'Поле Навание должно содержать не более 255 символов!',
            'description.required' => 'Поле Описание должно быть заполнено!',
            'description.min' => 'Поле Описание должно содержать не менее 5 символов!',
            'description.max' => 'Поле Описание должно содержать не более 500 символов!'
        ];
    }
}
