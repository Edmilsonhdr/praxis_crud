<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoLogradouro extends Model

{
    protected $table = 'tipo_logradouro';
    protected $fillable = ['id', 'nome'];

    // Não é necessário definir timestamps, a menos que você queira controlá-los
    public $timestamps = false;
}
