<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required', 'min:3', 'max:255'],
            'post' => ['required', 'min:6', 'max:500']
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Поле Название должно быть заполнено!',
            'title.min' => 'Поле Название должно содержать не менее 3 символов!',
            'title.max' => 'Поле Название должно содержать не более 255 символов!',
            'post.required' => 'Поле Пост должно быть заполнено!',
            'post.min' => 'Поле Пост должно содержать не менее 6 символов!',
            'post.max' => 'Поле Пост должно содержать не более 500 символов!'
        ];
    }
}
