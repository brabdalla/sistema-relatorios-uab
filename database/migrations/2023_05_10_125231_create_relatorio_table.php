<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelatorioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relatorio', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vinculo_id');
            $table->unsignedBigInteger('user_coordenador_id');
            $table->string('hash_validacao_coordenador');
            $table->dateTime('data_validacao_coordenador');
            $table->string('hash_validacao_bolsista');
            $table->dateTime('data_validacao_bolsista');
            $table->longText('descrição_atividades');
            $table->date('mes_ano_referencia');
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
        Schema::dropIfExists('relatorio');
    }
}
