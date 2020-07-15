<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->foreignId('revenda_id');
            $table->foreignId('empresas_id');
            $table->primary(['revenda_id', 'empresas_id']);
            $table->timestamps();
            $table->foreign('revenda_id')->references('id')->on('empresas')->onDelete('cascade');
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
        Schema::dropIfExists('clientes');
    }
}
