<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OsServico extends Model
{
    protected $table = 'os_servicos';

    protected $fillable = ['ordem_servico_id', 'servico_id', 'descricao_problema'];
}
