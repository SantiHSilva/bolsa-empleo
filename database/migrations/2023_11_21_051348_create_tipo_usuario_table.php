<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoUsuarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_usuario', function (Blueprint $table) {
            $table->increments('id_tipo_usuario');
            $table->string('tipo_usuario', 30);

            $table->unsignedInteger('id_registro');
            $table->foreign('id_registro')->references('id_registro')->on('users');
            $table->unsignedInteger('id_registro_emp');
            $table->foreign('id_registro_emp')->references('id_regristro_emp')->on('registro_empresa');

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
        Schema::dropIfExists('tipo_usuario');
    }
}
