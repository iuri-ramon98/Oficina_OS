<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mecanico extends Model
{
    protected $table='mecanicos';

    protected $fillable = ['nome', 'data_nascimento', 'cpf_cnpj', 'telefone', 'celular',
                           'data_admissao', 'salario', 'comissao'];

    public function ordem_servicos()
    {
        return $this->hasMany('App\OrdemServico', 'id', 'ordem_servicos_id');
    }
}
