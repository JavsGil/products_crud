<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Asegúrate de que se pueda autorizar la solicitud
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'currency_id' => 'required|integer|exists:currencies,id', // Asegúrate de que esto esté presente
            'tax_cost' => 'required|numeric|min:0',
            'manufacturing_cost' => 'required|numeric|min:0',
        ];
    }

    // Personaliza los mensajes si es necesario
    public function messages()
    {
        return [
            'currency_id.required' => 'El campo currency_id es obligatorio.',
            'currency_id.exists' => 'El currency_id proporcionado no es válido.',
        ];
    }
}


