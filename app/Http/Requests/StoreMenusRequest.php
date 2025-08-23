<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMenusRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O nome é obrigatório.',
            'name.string' => 'O nome deve ser uma string.',
            'name.max' => 'O nome não pode ter mais de 255 caracteres.',
            'description.string' => 'A descrição deve ser uma string.',
            'description.max' => 'A descrição não pode ter mais de 1000 caracteres.'
        ];
    }
} 