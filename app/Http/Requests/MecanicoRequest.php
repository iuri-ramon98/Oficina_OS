<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MecanicoRequest extends FormRequest
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
            'nome' => 'required|string|max:255',
            'data_nascimento' => 'required|date',
            'cpf_cnpj' => 'required|string|min:14|max:18',
            'telefone' => 'required|string|max:14',
            'celular' => 'required|string|max:15',
            'data_admissao' => 'required|date',
            'salario' => 'required|string|max:8',
            'comissao' => 'required|string|max:2',

        ];
    }
}
