<?php

use Illuminate\Database\Seeder;

class ServicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('servicos')->insert([
            'descricao' => 'Troca de Pneu', 
            'preco' => 211.50,
            'comissao' => 10,
            'duracao' => '00:02:10'
            ]);
        DB::table('servicos')->insert([
            'descricao' => 'Troca de Pneu', 
            'preco' => 211.50,
            'comissao' => 10,
            'duracao' => '00:02:10'
            ]); 
        DB::table('servicos')->insert([
        'descricao' => 'Troca de Oleo', 
        'preco' => 211.50,
        'comissao' => 10,
        'duracao' => '00:02:10'
        ]);        
        DB::table('servicos')->insert([
            'descricao' => 'Retifica de motor', 
            'preco' => 211.50,
            'comissao' => 10,
            'duracao' => '01:02:10'
            ]);       
        DB::table('servicos')->insert([
            'descricao' => 'Limpeza de carburador', 
            'preco' => 211.50,
            'comissao' => 10,
            'duracao' => '00:02:10'
        ]);
    }
}
