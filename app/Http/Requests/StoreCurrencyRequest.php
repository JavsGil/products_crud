<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCurrencyRequest extends FormRequest
{
    /**
     * Autoriza la solicitud.
     */
    public function authorize(): bool
    {
        return true; // Cambia a true si todos los usuarios pueden crear monedas
    }

    /**
     * Reglas de validación.
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'symbol' => 'required|string|unique:currencies',
            'exchange_rate' => 'required|numeric',
        ];
    }
}
