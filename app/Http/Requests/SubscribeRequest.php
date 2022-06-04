<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubscribeRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'subscribe' => ['required','min:3','max:255']
        ];
    }

    public function messages()
    {
        return [
            'subscribe.required' => 'Поле Название должно быть заполнено!',
            'subscribe.min' => 'Поле Название должно содержать не менее 3 символов!',
            'subscribe.max' => 'Поле Название должно содержать не более 255 символов!'
        ];
    }
}
