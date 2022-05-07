<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'min:2', 'max:255']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Поле Роль должно быть заполнено!',
            'name.min' => 'Поле Роль должно содержать не менее 2 символов!',
            'name.max' => 'Поле Роль должно содержать не более 255 символов!'
        ];
    }
}
