<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegistrationRequest extends FormRequest
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
            'name'            => 'required|min:3|max:255',
            'email'            => ['required','min:5','max:255', Rule::unique('users')],
            'avatar'            => ['required'],
            'password'         => 'required|min:6',
            'password-confirm' => 'required|same:password|min:6'
        ];
    }

    public function messages()
    {
        return [
            'name.required'             => 'Поле Имя должно быть заполнено!',
            'name.min'                  => 'Поле Имя должно содержать не менее 3 символов!',
            'name.max'                  => 'Поле Имя должно содержать не более 255 символов!',
            'email.required'            => 'Поле email должно быть заполнено!',
            'email.min'                 => 'Поле email должно содержать не менее 5 символов!',
            'email.max'                 => 'Поле email должно содержать не более 255 символов!',
            'email.unique'              => 'Пользователь с таким E-mail уже существует!',
            'avatar.required'            => 'Поле Аватар должно быть заполнено!',
            'password.required'         => 'Поле Пароль должно быть заполнено!',
            'password.min'              => 'Поле Пароль должно содержать не менее 6 символов!',
            'password-confirm.required' => 'Поле Подтвердите Пароль должно быть заполнено!',
            'password-confirm.min'      => 'Поле Подтвердите Пароль должно содержать не менее 6 символов!',
            'password-confirm.same'     => 'Пароли не совпадают!'
        ];
    }
}
