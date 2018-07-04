<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaParques extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('parques', function(Blueprint $table) {
            $table->increments('id');
            
            $table->string('nome');
            $table->unsignedInteger('ambiente_id');
            $table->unsignedInteger('empresas_id');
            $table->unsignedInteger('endereco_id');
            $table->foreign('ambiente_id')->references('id')->on('ambiente');
            $table->foreign('empresas_id')->references('id')->on('empresas');
            $table->foreign('endereco_id')->references('id')->on('enderecos');
            
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('parques');
    }
}