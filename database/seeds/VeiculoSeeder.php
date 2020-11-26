<?php

use Illuminate\Database\Seeder;

class VeiculoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('veiculos')->insert([
            'cliente_id' => '3', 
            'placa' => 'bla-1580',
            'cidade' => 'Birigui',
            'modelo' => 'Fusca',
            'marca' => 'VW',
            'cor' => "cinza",
            'ano_fabricacao' => 1992,
            'ano_modelo' => 1992,
            'renavam'=> 651651651651,
            'combustivel' => 1
            ]);

       DB::table('veiculos')->insert([
            'cliente_id' => '1', 
            'placa' => 'bla-1580',
            'cidade' => 'Birigui',
            'modelo' => 'Uno',
            'marca' => 'Fiat',
            'cor' => "cinza",
            'ano_fabricacao' => 1992,
            'ano_modelo' => 1992,
            'renavam'=> 651651651651,
            'combustivel' => 1
            ]);
        DB::table('veiculos')->insert([
            'cliente_id' => '2', 
            'placa' => 'bla-1580',
            'cidade' => 'Birigui',
            'modelo' => 'Fiesta',
            'marca' => 'Ford',
            'cor' => "cinza",
            'ano_fabricacao' => 1992,
            'ano_modelo' => 1992,
            'renavam'=> '651651651651',
            'combustivel' => 1
            ]);


            DB::table('veiculos')->insert([
                'cliente_id' => '2', 
                'placa' => 'bla-1580',
                'cidade' => 'Birigui',
                'modelo' => 'Fiesta',
                'marca' => 'Ford',
                'cor' => "cinza",
                'ano_fabricacao' => 1992,
                'ano_modelo' => 1992,
                'renavam'=> '651651651651',
                'combustivel' => 1
                ]);
    }
}


