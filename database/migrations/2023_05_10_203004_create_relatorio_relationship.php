<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelatorioRelationship extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('relatorio', function (Blueprint $table) {
            $table->foreign('user_coordenador_id')->references('id')->on('users')->onUpdate('CASCADE');
            $table->foreign('vinculo_id')->references('id')->on('vinculo')->onUpdate('CASCADE');
            
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
            $table->dropForeign(['user_coordenador_id']);
            $table->dropForeign(['vinculo_id']);
        });
    }
}
