<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdemServico extends Model
{
    protected $table = 'ordem_servicos';

    protected $fillable = ['veiculo_id', 'mecanico_id', 'inicio', 'final', 'obs', 'preco', 'status']; 

    public function mecanicos()
    {
        return $this->belongsTo('App\Mecanico', 'mecanico_id', 'id');
    }

    public function veiculos()
    {
        return $this->belongsTo('App\Veiculo', 'veiculo_id', 'id');
    }

    public function produtos()
    {
        return $this->belongsToMany('App\Produto', 'os_produtos');
    }

    public function servicos()
    {
        return $this->belongsToMany('App\Servico', 'os_servicos')->withPivot('descricao_problema');
    }
}
