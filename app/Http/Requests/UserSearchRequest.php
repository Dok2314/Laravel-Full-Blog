<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserSearchRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_search' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'user_search.required' => 'Поле должно быть заполнено!'
        ];
    }
}
