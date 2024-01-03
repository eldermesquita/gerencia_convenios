<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UsuarioUpdateRequest extends FormRequest
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
            'nome' => ['required', 'max:255', 'string'],
            'email' => [
                'required',
                Rule::unique('usuarios', 'email')->ignore($this->usuario),
                'email',
            ],
            'password' => ['nullable'],
            'roles' => 'array',
        ];
    }
}