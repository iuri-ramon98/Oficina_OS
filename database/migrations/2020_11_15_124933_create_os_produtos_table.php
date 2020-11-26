<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOsProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('os_produtos', function (Blueprint $table) {

            $table->integer('ordem_servico_id')->unsigned();
            $table->integer('produto_id')->unsigned();
            
            $table->foreign('ordem_servico_id')->references('id')->on('ordem_servicos')->onDelete('cascade');
            $table->foreign('produto_id')->references('id')->on('produtos')->onDelete('cascade');

            $table->primary(['ordem_servico_id', 'produto_id']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('os_produtos');
    }
}
