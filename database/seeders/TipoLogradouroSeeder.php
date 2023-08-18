<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoLogradouroSeeder extends Seeder
{
    public function run()
    {
        DB::table('tipo_logradouro')->insert([
            ['nome' => 'Rua'],
            ['nome' => 'Avenida'],
            ['nome' => 'Praça'],
        ]);
    }
}
