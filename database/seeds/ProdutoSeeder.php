<?php

use Illuminate\Database\Seeder;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produtos')->insert([
            'descricao' => 'Caixa de cambio', 
            'custo' => 200.50,
            'preco' => 211.50
            ]);
        DB::table('produtos')->insert([
            'descricao' => 'Pneu firestone', 
            'custo' => 200.50,
            'preco' => 211.50
            ]);


        DB::table('produtos')->insert([
            'descricao' => 'Parafuso 5mm', 
            'custo' => 5.50,
            'preco' => 10.50
            ]);
    
    }
}
