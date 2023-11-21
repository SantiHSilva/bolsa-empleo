<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistroEmpresaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registro_empresa', function (Blueprint $table) {
            $table->increments('id_regristro_emp');
            $table->string('nit', 45);
            $table->string('razon_social', 45);
            $table->string('representante_legal', 45);
            $table->string('correo_corporativo', 45);
            $table->string('telefono', 45);
            $table->string('contrasena', 45);
            // Confirmar contraseña

            $table->unsignedInteger('id_empresa');
            $table->foreign('id_empresa')->references('id_empresa')->on('empresa');

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
        Schema::dropIfExists('registro_empresa');
    }
}
