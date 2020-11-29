<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ClienteSeeder::class);
        $this->call(MecanicoSeeder::class);
        $this->call(VeiculoSeeder::class);
        //$this->call(OrdemServicoSeeder::class);
        $this->call(ServicoSeeder::class);
        $this->call(ProdutoSeeder::class);
        
    }
}
