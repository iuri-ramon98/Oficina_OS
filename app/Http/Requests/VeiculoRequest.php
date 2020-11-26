<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VeiculoRequest extends FormRequest
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
            'placa' => 'required|string|min:7|max:8',
            'cidade' => 'required|string|max:40',
            'modelo' => 'required|string|max:40',
            'marca' => 'required|string|max:40',
            'cor' => 'required|string|max:40',
            'ano_fabricacao' => 'required|string|min:4|max:4',
            'ano_modelo' => 'required|string|min:4|max:4',
            'renavam' => 'required|string|min:11|max:11',
        ];
    }
}
