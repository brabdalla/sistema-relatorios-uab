<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterRelatorioNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('relatorio', function (Blueprint $table) {

            $table->string('hash_validacao_coordenador')->nullable()->change();
            $table->dateTime('data_validacao_coordenador')->nullable()->change();
            $table->string('hash_validacao_bolsista')->nullable()->change();
            $table->dateTime('data_validacao_bolsista')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('relatorio', function (Blueprint $table) {

            $table->string('hash_validacao_coordenador')->nullable(false)->change();
            $table->dateTime('data_validacao_coordenador')->nullable(false)->change();
            $table->string('hash_validacao_bolsista')->nullable(false)->change();
            $table->dateTime('data_validacao_bolsista')->nullable(false)->change();
        });
    }
}
