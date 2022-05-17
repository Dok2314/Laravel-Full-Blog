<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentsRequest extends FormRequest
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
            'comment' => ['required', 'min:5', 'max:500']
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Поле Название должно быть заполнено!',
            'title.min' => 'Поле Название должно содержать не менее 3 символов!',
            'title.max' => 'Поле Название должно содержать не более 255 символов!',
            'comment.required' => 'Поле Коментарий должно быть заполнено!',
            'comment.min' => 'Поле Коментарий должно содержать не менее 5 символов!',
            'comment.max' => 'Поле Коментарий должно содержать не более 500 символов!'
        ];
    }
}
