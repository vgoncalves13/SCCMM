<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriandoTabelaEnderecos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enderecos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('logradouro');
            $table->integer('numero');
            $table->string('complemento');
            $table->string('cep');
            $table->string('bairro');
            $table->string('cidade');
            $table->string('uf');

            $table->unsignedInteger('empresas_id');
            $table->foreign('empresas_id')
              ->references('id')
              ->on('empresas')
              ->onDelete('cascade')
              ->onUpdate('cascade');
            
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
        Schema::dropIfExists('enderecos');
    }
}
