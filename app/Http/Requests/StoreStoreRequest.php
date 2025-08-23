<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStoreRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'image' => 'nullable|string|max:500',
            'telephone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:500',
            'link' => 'nullable|url|max:500'
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'O nome da loja é obrigatório.',
            'name.string' => 'O nome deve ser uma string.',
            'name.max' => 'O nome não pode ter mais de 255 caracteres.',
            'description.string' => 'A descrição deve ser uma string.',
            'description.max' => 'A descrição não pode ter mais de 1000 caracteres.',
            'image.string' => 'A imagem deve ser uma string.',
            'image.max' => 'O caminho da imagem não pode ter mais de 500 caracteres.',
            'telephone.string' => 'O telefone deve ser uma string.',
            'telephone.max' => 'O telefone não pode ter mais de 20 caracteres.',
            'address.string' => 'O endereço deve ser uma string.',
            'address.max' => 'O endereço não pode ter mais de 500 caracteres.',
            'link.url' => 'O link deve ser uma URL válida.',
            'link.max' => 'O link não pode ter mais de 500 caracteres.'
        ];
    }
} 