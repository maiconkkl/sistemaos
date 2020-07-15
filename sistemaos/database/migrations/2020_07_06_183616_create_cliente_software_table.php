<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClienteSoftwareTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cliente_software', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empresas_id')->unsigned();
            $table->foreignId('software_id')->unsigned();
            $table->foreignId('version_id')->unsigned();
            $table->timestamps();
            $table->foreign('empresas_id')->references('id')->on('empresas');
            $table->foreign('software_id')->references('id')->on('software');
            $table->foreign('version_id')->references('id')->on('software_versions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cliente_software');
    }
}
