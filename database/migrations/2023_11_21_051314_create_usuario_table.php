<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->increments('id_usuario');
            $table->string('nombre_completo', 65);
            $table->string('telefono', 45);
            $table->string('cedula', 45);
            $table->string('foto', 45);
            $table->string('genero', 45);
            $table->string('pais', 45);
            $table->string('ciudad', 45);
            $table->string('hoja_de_vida', 45);

            $table->unsignedInteger('id_perfil_academico');
            $table->foreign('id_perfil_academico')->references('id_perfil_academico')->on('perfil_academico');

            $table->unsignedInteger('id_perfil_laboral');
            $table->foreign('id_perfil_laboral')->references('id_perfil_laboral')->on('perfil_laboral');

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
        Schema::dropIfExists('usuario');
    }
}
