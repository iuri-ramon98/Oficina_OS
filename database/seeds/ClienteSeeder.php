<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clientes')->insert([
            'nome' => 'Tales', 
            'data_nascimento' => Carbon::createFromFormat('d/m/Y','04/10/2003')->format('Y-m-d'), 
            'cpf_cnpj' => '123.456.789-10',
            'telefone' => '132131321231312',
            'celular' => '476876768768767',
            'endereco' => 'rua x, bairro y',
            'cidade' => 'Birigui',
            'flag_inadimplente' => 0
            ]);

        DB::table('clientes')->insert([
            'nome' => 'Maria', 
            'data_nascimento' => Carbon::createFromFormat('d/m/Y','12/04/1998')->format('Y-m-d'), 
            'cpf_cnpj' => '123.456.789-10',
            'telefone' => '132131321231312',
            'celular' => '476876768768767',
            'endereco' => 'rua x, bairro y',
            'cidade' => 'Birigui',
            'flag_inadimplente' => 0
            ]);

        DB::table('clientes')->insert([
            'nome' => 'Jorge', 
            'data_nascimento' => Carbon::createFromFormat('d/m/Y','11/04/2000')->format('Y-m-d'), 
            'cpf_cnpj' => '123.456.789-10',
            'telefone' => '132131321231312',
            'celular' => '476876768768767',
            'endereco' => 'rua x, bairro y',
            'cidade' => 'Birigui',
            'flag_inadimplente' => 0
            ]);

        DB::table('clientes')->insert([
            'nome' => 'Carlos', 
            'data_nascimento' => Carbon::createFromFormat('d/m/Y','11/06/1998')->format('Y-m-d'), 
            'cpf_cnpj' => '123.456.789-10',
            'telefone' => '132131321231312',
            'celular' => '476876768768767',
            'endereco' => 'rua x, bairro y',
            'cidade' => 'Birigui',
            'flag_inadimplente' => 0
            ]);

        DB::table('clientes')->insert([
            'nome' => 'Silas', 
            'data_nascimento' => Carbon::createFromFormat('d/m/Y','12/04/2005')->format('Y-m-d'), 
            'cpf_cnpj' => '123.456.789-10',
            'telefone' => '132131321231312',
            'celular' => '476876768768767',
            'endereco' => 'rua x, bairro y',
            'cidade' => 'Birigui',
            'flag_inadimplente' => 0
            ]);
    }
}

