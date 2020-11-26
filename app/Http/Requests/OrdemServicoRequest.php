<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrdemServicoRequest extends FormRequest
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
            'obs' => 'required|string',
            'cliente_select' => 'required|not_in:0',
            'veiculo_id' => 'required|not_in:0',
            'mecanico_id' => 'required|not_in:0',
            /*
            'servico_id' => 'required|not_in:0',
            'produto_id' => 'required|not_in:0',

            'descricao_servico' => 'required|string',
            'valor_produto' => 'required|string',*/
        ];
    }
}
