<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('cpf');
            $table->string('rg');
            $table->date('data_nascimento')->nullable();
            $table->string('telefone');
            $table->string('curso_superior');
            $table->string('pos_graduacao');
            $table->string('area_pos')->nullable();
            $table->string('sexo');
            $table->string('cep');
            $table->string('endereco');
            $table->string('bairro');
            $table->string('cidade');
            $table->string('estado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('cpf');
            $table->dropColumn('rg');
            $table->dropColumn('data_nascimento');
            $table->dropColumn('telefone');
            $table->dropColumn('curso_superior');
            $table->dropColumn('pos_graduacao');
            $table->dropColumn('area_pos');
            $table->dropColumn('sexo');
            $table->dropColumn('cep');
            $table->dropColumn('endereco');
            $table->dropColumn('bairro');
            $table->dropColumn('cidade');
            $table->dropColumn('estado');
            
        });
    }
}
