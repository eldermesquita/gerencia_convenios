<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ProcessoUpdateRequest extends FormRequest
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
            'ano' => ['required', 'numeric'],
            'licitado' => ['nullable', 'boolean'],
            'modalidade' => ['required', 'in:x,y,z'],
            'orgao_id' => ['required', 'exists:orgaos,id'],
            'convenio_id' => [
                'required',
                Rule::unique('processos', 'convenio_id')->ignore(
                    $this->processo
                ),
                'exists:convenios,id',
            ],
        ];
    }
}
