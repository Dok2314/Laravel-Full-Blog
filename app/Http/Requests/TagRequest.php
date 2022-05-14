<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TagRequest extends FormRequest
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
            'description' => ['required', 'min:5', 'max:500'],
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Поле Тег должно быть заполнено!',
            'title.min' => 'Поле Тег должно содержать не менее 3 символов!',
            'title.max' => 'Поле Тег должно содержать не более 255 символов!',
            'description.required' => 'Поле Описание должно быть заполнено!',
            'description.min' => 'Поле Описание должно содержать не менее 3 символов!',
            'description.max' => 'Поле Описание должно содержать не более 255 символов!'
        ];
    }
}
