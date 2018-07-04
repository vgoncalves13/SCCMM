<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaEquipamentos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipamentos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('numero_serie');
            $table->ipAddress('endereco_ip');
            $table->string('local');
            // Chave estrangeira
            $table->unsignedInteger('modelos_id');
            $table->unsignedInteger('parques_id');
            $table->foreign('modelos_id')->references('id')->on('modelos');
            $table->foreign('parques_id')->references('id')->on('parques');
            
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
        Schema::dropIfExists('equipamentos');
    }
}
