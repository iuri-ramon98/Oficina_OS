<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    protected $table = 'servicos';

    protected $fillable = ['descricao', 'preco', 'comissao', 'duracao'];

    public function ordem_servicos()
    {
        return $this->belongsToMany('App\OrdemServico', 'os_servicos')->withPivot('descricao_problema');
    }
}

