<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class OrdemServicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ordem_servicos')->insert([
            'veiculo_id' => 4, 
            'mecanico_id' => 2,
            'inicio' => Carbon::createFromFormat('d/m/Y H:i:s','17/11/2020 18:00:00')->format('Y-m-d  H:i:s'), 
            'obs' => 'Teste de OS',
            'preco' => 400,
            'status' => 1, //em aberto

            ]);

        DB::table('ordem_servicos')->insert([
            'veiculo_id' => 7, 
            'mecanico_id' => 1,
            'inicio' => Carbon::createFromFormat('d/m/Y H:i:s','15/11/2020 18:00:00')->format('Y-m-d  H:i:s'), 
            'final' => Carbon::createFromFormat('d/m/Y H:i:s','17/11/2020 18:00:00')->format('Y-m-d  H:i:s'), 
            'obs' => 'Teste de OS 2',
            'preco' => 400,
            'status' => 2, //finalizada

            ]);

        DB::table('ordem_servicos')->insert([
            'veiculo_id' => 9, 
            'mecanico_id' => 2,
            'inicio' => Carbon::createFromFormat('d/m/Y H:i:s','14/11/2020 18:00:00')->format('Y-m-d  H:i:s'), 
            'final' => Carbon::createFromFormat('d/m/Y H:i:s','15/11/2020 18:00:00')->format('Y-m-d  H:i:s'), 
            'obs' => 'Teste de OS 3',
            'preco' => 400,
            'status' => 3, //cancelada

            ]);
    }
}



