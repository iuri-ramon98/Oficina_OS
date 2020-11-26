<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = 'produtos';

    protected $fillable = ['descricao', 'custo', 'preco'];

    public function ordem_servicos()
    {
        return $this->belongsToMany('App\OrdemServico', 'os_produtos');
    }
}
