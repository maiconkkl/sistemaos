<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoftwareVersionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('software_versions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('software_id')->unsigned();
            $table->string('version', 10);
            $table->string('url_download', 250);
            $table->timestamps();
            $table->foreign('software_id')->references('id')->on('software');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('versions');
    }
}
