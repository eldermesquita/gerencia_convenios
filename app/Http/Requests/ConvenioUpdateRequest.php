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
            'objeto' => ['required', 'max:255', 'string'],
            'numero_processo' => ['required', 'max:30', 'string'],
            'valor_repasse' => ['required', 'numeric'],
            'valor_contra_partida' => ['required', 'numeric'],
            'valor_total' => ['required', 'numeric'],
            'valor_liberado_concedente' => ['required', 'numeric'],
            'valor_pago' => ['required', 'numeric'],
            'valor_liberado' => ['required', 'numeric'],
            'virgencia_execucao' => ['required', 'date'],
            'virgencia_contrato' => ['required', 'date'],
            'contrato_id' => ['required', 'exists:contratos,id'],
            'orgao_id' => ['required', 'exists:orgaos,id'],
        ];
    }
}
