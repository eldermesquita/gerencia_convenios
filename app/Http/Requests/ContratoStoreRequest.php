<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContratoStoreRequest extends FormRequest
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
            'numero' => ['required', 'max:255', 'string'],
            'numero_processo' => ['required', 'max:15', 'string'],
            'virgencia' => ['required', 'date'],
            'virgencia_execucao' => ['required', 'date'],
            'valor' => ['required', 'numeric'],
            'modalidade' => [
                'required',
                'in:concorrência,convite,tomada de preço,concurso,pregão,leilão',
            ],
            'empresa_id' => ['required', 'exists:empresas,id'],
        ];
    }
}
