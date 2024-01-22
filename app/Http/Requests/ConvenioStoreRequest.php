<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConvenioStoreRequest extends FormRequest
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
        //dd(parent::all());
        return [
            'numero' => ['required', 'max:50', 'string'],
            'ano' => ['required', 'numeric'],

            'parlamentar_id' => ['nullable', 'exists:parlamentares,id'],

            'processo.numero' => ['required', 'max:50', 'string'],
            'processo.ano' => ['required', 'numeric', 'digits:4'],
            'processo.orgao_id' => ['required', 'exists:orgaos,id'],
            'processo.licitado' => ['required', 'boolean'],
            'processo.modalidade' => ['required', 'in:Concorrência, Convite, Tomada de preço, Concurso, Pregão, Leilão',],
            'processo.convenio_id' => ['nullable', 'unique:processos,convenio_id', 'exists:convenios,id',],

            'valor_repasse' => ['required', 'numeric'],
            'valor_contrapartida' => ['required', 'numeric'],
            'inicio_vigencia' => ['required', 'date'],
            'fim_vigencia' => ['required', 'date'],
            'vigencia_prestacao_contas' => ['nullable', 'date'],
            'objeto' => ['required', 'max:255', 'string'],

        ];
    }




    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {

        return [


            'numero.required' => 'O campo número do convênio é obrigatório!',
            'ano.required' => 'O campo ano do convênio é obrigatório!',
            'valor_repasse.required' => 'O campo valor do repasse é obrigatório!',
            'valor_contrapartida.required' => 'O campo valor contrapartida é obrigatório!',
            'inicio_vigencia.required' => 'O campo início vigência é obrigatório!',
            'inicio_vigencia.date' => 'Data início vigência é inválida!',
            'fim_vigencia.required' => 'O campo fim vigência é obrigatório!',
            'fim_vigencia.date' => 'Data fim vigência é inválida!',

            'processo.numero.required' => 'O campo número do processo é obrigatório!',
            'processo.ano.required' => 'O campo ano do processo é obrigatório!',
            'processo.orgao_id.required' => 'O campo orgão é obrigatório!',
            'processo.orgao_id.exists' => 'O campo orgão não encontrado!',
            'processo.licitado.required' => 'O campo licitado é obrigatório!',
            'processo.modalidade.required' => 'O campo modalidade é obrigatório!',
            //'processo.convenio_id.required' => 'O campo denominação é obrigatório!',

            /*
           'denominacao_id.required' => 'O campo denominação é obrigatório!',
            'denominacao_id.exists' => 'O campo denominação selecionado é inválido!',
            'categoria_id.required' => 'O campo denominação é obrigatório!',
            'categoria_id.exists' => 'O campo categoria selecionado é inválido!',
            'categoria_id.required' => 'O campo categoria é obrigatório!',
            'classe_id.exists' => 'O campo classe selecionado é inválido!',
            'classe_id.required' => 'O campo classe é obrigatório!',
            'subcategoria_id.required' => 'O campo subcategoria é obrigatório!',
            'subcategoria_id.exists' => 'O campo subcategoria selecionado é inválido!',
            'naturezaItem.required' => 'Natureza do item é obrigatório!',
            'imagem_link.url' => 'O campo link da imagem possui um preenchimento inválido.',
            */
        ];
    }
}
