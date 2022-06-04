<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required','min:3','max:255'],
            'email' => ['required','min:5','max:255'],
            'password' => ['required','min:6','max:255'],
            'password-confirm' => ['required','same:password','min:6']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Поле Имя должно быть заполнено!',
            'name.min' => 'Поле Имя должно содержать не менее 3 символов!',
            'name.max' => 'Поле Имя должно содержать не более 255 символов!',
            'email.required' => 'Поле E-emails должно быть заполнено!',
            'email.min' => 'Поле E-emails должно содержать не менее 5 символов!',
            'email.max' => 'Поле E-emails должно содержать не более 255 символов!',
            'password.required' => 'Поле Пароль должно быть заполнено!',
            'password.min' => 'Поле Пароль должно содержать не менее 6 символов!',
            'password.max' => 'Поле Пароль должно содержать не более 255 символов!',
            'password-confirm.required' => 'Поле Подтвердите Пароль должно быть заполнено!',
            'password-confirm.min'      => 'Поле Подтвердите Пароль должно содержать не менее 6 символов!',
            'password-confirm.same'     => 'Пароли не совпадают!'
        ];
    }
}
