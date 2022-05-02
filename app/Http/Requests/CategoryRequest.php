<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'title'       => ['required', 'min:3', 'max:255'],
            'description' => ['required', 'min:5', 'max:500']
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Поле Название должно быть заполненым!',
            'title.min' => 'Поле Название должно содержать не менее 3 символов!',
            'title.max' => 'Поле Название должно содержать не более 255 символов!',
            'description.required' => 'Поле Описание Категории должно быть заполненым!',
            'description.min' => 'Поле Описание Категории должно содержать не менее 5 символов!',
            'description.max' => 'Поле Описание Категории должно содержать не более 500 символов!'
        ];
    }
}
