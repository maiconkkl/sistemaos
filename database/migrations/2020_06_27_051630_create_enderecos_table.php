<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnderecosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enderecos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empresas_id');
            $table->string('logradouro',100);
            $table->string('bairro',50);
            $table->string('numero', 10)->nullable(true);
            $table->string('complemento',250)->nullable(true);
            $table->string('cidade',50);
            $table->string('estado',2);
            $table->string('tipo',50);
            $table->timestamps();
            $table->foreign('empresas_id')->references('id')->on('empresas')->onDelete('cascade');
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
