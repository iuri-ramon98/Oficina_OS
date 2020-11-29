<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class MecanicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mecanicos')->insert([
            'nome' => 'Ricardo', 
            'data_nascimento' => Carbon::createFromFormat('d/m/Y','04/10/2003')->format('Y-m-d'), 
            'cpf_cnpj' => '123.456.789-10',
            'telefone' => '132131321231312',
            'celular' => '476876768768767',
            'data_admissao' => Carbon::createFromFormat('d/m/Y','04/12/2019')->format('Y-m-d'),
            'salario' => 1200,
            'comissao' => 10
            ]);
        DB::table('mecanicos')->insert([
            'nome' => 'Rubens', 
            'data_nascimento' => Carbon::createFromFormat('d/m/Y','04/10/2003')->format('Y-m-d'), 
            'cpf_cnpj' => '123.456.789-10',
            'telefone' => '132131321231312',
            'celular' => '476876768768767',
            'data_admissao' => Carbon::createFromFormat('d/m/Y','04/12/2019')->format('Y-m-d'),
            'salario' => 1200,
            'comissao' => 10
            ]);
            DB::table('mecanicos')->insert([
                'nome' => 'Paulo', 
                'data_nascimento' => Carbon::createFromFormat('d/m/Y','04/10/2003')->format('Y-m-d'), 
                'cpf_cnpj' => '123.456.789-10',
                'telefone' => '132131321231312',
                'celular' => '476876768768767',
                'data_admissao' => Carbon::createFromFormat('d/m/Y','04/12/2019')->format('Y-m-d'),
                'salario' => 1200,
                'comissao' => 10
                ]);
    }
}
