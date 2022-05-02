<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email'    => ['required','min:5', 'max:255'],
            'password' => ['required','min:6', 'max:255']
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Поле E-mail должно быть заполнено!',
            'email.min' => 'Поле E-mail должно содержать не менее 5 символов!',
            'email.max' => 'Поле E-mail должно содержать не более 255 заполнено!',
            'password.required' => 'Поле Пароль должно быть заполнено!',
            'password.min' => 'Поле Пароль должно содержать не менее 6 символов!',
            'password.max' => 'Поле Пароль должно содержать не более 255 заполнено!'
        ];
    }
}
