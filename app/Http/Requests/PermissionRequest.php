<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PermissionRequest extends FormRequest
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
            'name' => ['required', 'min:3', 'max:255'],
            'code' => ['required', 'min:1', 'max:255']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Поле Название должно быть заполнено!',
            'name.min' => 'Поле Название должно содержать не менее 3 символов!',
            'name.max' => 'Поле Название должно содержать не более 255 символов!',
            'code.required' => 'Поле Сокращение должно быть заполнено!',
            'code.min' => 'Поле Сокращение должно содержать не менее 3 символов!',
            'code.max' => 'Поле Сокращение должно содержать не более 255 символов!'
        ];
    }
}
