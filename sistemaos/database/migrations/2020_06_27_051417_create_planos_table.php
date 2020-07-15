<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planos', function (Blueprint $table) {
            $table->id();
            $table->string('nome',100);
            $table->integer('autorizacao',false,true)->comment(
                '1 - Solicita autorização, 2 - Sem solicitação de Autorização, 3 - Observação em no cliente');
            $table->boolean('atende')->comment('Essa empresa faz atendimento ?');
            $table->double('percentual_atendimento', '3', 2, true)->comment(
                'Percentual cobrado sobre o valor do atendimento realizado');
            $table->double('taxa_fixa', '3', 2, true)->comment(
                'Taxa fixa cobrado sobre o valor do atendimento realizado');
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
        Schema::dropIfExists('planos');
    }
}
