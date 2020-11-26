<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServicoRequest extends FormRequest
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
            'descricao' => 'required|string|max:255',
            'preco' => 'required|string|max:8',
            'comissao' => 'required|string|max:2',
            'duracao_dias' => 'required|string|max:2',
            'duracao_time' => 'required|string|max:5'
        ];
    }
}
