<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CidadeSeeder extends Seeder
{
    public function run()
    {
        DB::table('cidade')->insert([
            ['nome' => 'Belo Horizonte'],
            ['nome' => 'Betim'],
            ['nome' => 'Contagem'],
        ]);
    }
}
