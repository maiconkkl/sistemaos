<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoftwareServicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('software_servicos', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100);
            $table->foreignId('software_id')->unsigned();
            $table->foreignId('modulo_id')->unsigned();
            $table->timestamps();
            $table->foreign('software_id')->references('id')->on('software');
            $table->foreign('modulo_id')->references('id')->on('software_modulos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('software_servicos');
    }
}
