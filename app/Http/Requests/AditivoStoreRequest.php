<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AditivoStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'numero' => ['required', 'max:15', 'string'],
            'tipo' => [
                'required',
                'in:aditivos de execução,aditivo de contrato',
            ],
            'prazo' => ['required', 'date'],
        ];
    }
}
