<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOsServicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('os_servicos', function (Blueprint $table) {
            $table->integer('ordem_servico_id')->unsigned();
            $table->integer('servico_id')->unsigned();
            $table->string('descricao_problema')->nullable();

            $table->foreign('ordem_servico_id')->references('id')->on('ordem_servicos')->onDelete('cascade');
            $table->foreign('servico_id')->references('id')->on('servicos')->onDelete('cascade');

            $table->primary(['ordem_servico_id', 'servico_id']);


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
        Schema::dropIfExists('os_servicos');
    }
}
