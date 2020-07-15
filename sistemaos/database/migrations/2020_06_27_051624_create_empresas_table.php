<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('plano_id')->nullable(true);
            $table->string('razao', 100);
            $table->string('fantasia', 100);
            $table->integer('tipo')->comment('0 - Empresa administrador do sistema;
            1 - Empresa parceira; 2 - Cliente das empresas parceiras')->unsigned();
            $table->timestamps();
            $table->foreign('plano_id')->references('id')->on('planos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresas');
    }
}
