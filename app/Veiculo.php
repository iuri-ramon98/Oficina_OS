<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    protected $table = 'veiculos';

    protected $fillable = ['cliente_id', 'placa', 'cidade', 'modelo', 'marca', 'cor', 'ano_fabricacao',
                            'ano_modelo', 'renavam', 'combustivel'];

    public function cliente()
    {
        return $this->belongsTo('App\Cliente', 'cliente_id', 'id');
  
    }

    public function ordem_servicos()
    {
        return $this->hasMany('App\OrdemServico', 'id', 'ordem_servico_id');
    }

}


