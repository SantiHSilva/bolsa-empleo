<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerfilAcademicoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perfil_academico', function (Blueprint $table) {
            $table->increments('id_perfil_academico');
            $table->string('nom_universidad', 45);
            $table->date('fecha_inicio_universidad');
            $table->date('fecha_fin_universidad');
            $table->string('cursando_universidad', 45);
            $table->string('certifiados', 45);
            $table->string('nom_colegio_bachiller', 45);
            $table->date('fecha_inicio_colegio');
            $table->date('fecha_fin_colegio');
            $table->string('titulo_profesional', 45);

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
        Schema::dropIfExists('perfil_academico');
    }
}
