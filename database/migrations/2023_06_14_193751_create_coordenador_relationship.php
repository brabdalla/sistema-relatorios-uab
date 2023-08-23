<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoordenadorRelationship extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('coordenador', function (Blueprint $table) {
            $table->foreign('curso_coordenador_id')->references('id')->on('curso')->onUpdate('CASCADE');
            $table->foreign('user_coordenador_id')->references('id')->on('users')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('coordenador', function (Blueprint $table) {
            $table->dropForeign(['curso_coordenador_id']);
            $table->dropForeign(['user_coordenador_id']);
        });
    }
}
