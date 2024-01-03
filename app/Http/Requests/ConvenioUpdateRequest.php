<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConvenioUpdateRequest extends FormRequest
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
            'numero' => ['required', 'max:50', 'string'],
            'ano' => ['required', 'numeric'],
            'objeto' => ['required', 'max:255', 'string'],
            'ano_processo' => ['required', 'numeric'],
            'numero_processo' => ['required', 'max:30', 'string'],
            'valor_repasse' => ['required', 'numeric'],
            'valor_contrapartida' => ['required', 'numeric'],
            'inicio_vigencia' => ['required', 'date'],
            'fim_vigencia' => ['required', 'date'],
            'vigencia_prestacao_contas' => ['nullable', 'date'],
            'parlamentar_id' => ['nullable', 'exists:parlamentares,id'],
        ];
    }
}
