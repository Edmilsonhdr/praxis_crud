<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoLogradouro extends Model

{
    protected $table = 'tipo_logradouro';
    protected $fillable = ['id', 'nome'];

    public $timestamps = false;
}
