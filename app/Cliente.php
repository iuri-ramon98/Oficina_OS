<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table='clientes';

    protected $fillable = ['nome', 'data_nascimento', 'cpf_cnpj', 'telefone', 'celular',
                           'endereco', 'cidade', 'flag_inadimplente'];



    public function veiculos()
    {
        return $this->hasMany('App\Veiculo', 'id', 'veiculos_id');
    }

}
