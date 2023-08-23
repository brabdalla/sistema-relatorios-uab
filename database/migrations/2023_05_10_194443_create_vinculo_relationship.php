<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVinculoRelationship extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vinculo', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('CASCADE');
            $table->foreign('funcao_uab_id')->references('id')->on('funcao')->onUpdate('CASCADE');
            $table->foreign('curso_id')->references('id')->on('curso')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vinculo', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['funcao_uab_id']);
            $table->dropForeign(['curso_id']);

        });
    }
}
