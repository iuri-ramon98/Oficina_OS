<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OsProduto extends Model
{
    protected $table = 'os_produtos';

    protected $fillable = ['ordem_servico_id', 'produtos_id'];
}
