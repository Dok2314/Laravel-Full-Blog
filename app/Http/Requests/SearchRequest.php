<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'search' => 'required'
        ];
    }

    public function messages()
    {
        return [
           'search.required' => 'Поле должно быть заполнено!'
        ];
    }
}
