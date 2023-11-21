<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerfilLaboralTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perfil_laboral', function (Blueprint $table) {
            $table->increments('id_perfil_laboral');
            $table->string('perfil', 45);
            $table->string('nombre_empresa', 45);
            $table->date('fecha_ini');
            $table->date('fecha_fin');
            $table->string('trabajo_actual', 45);    
            $table->string('cargo_desempeñado', 45);
            $table->string('descripción cargo', 150);
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
        Schema::dropIfExists('perfil_laboral');
    }
}
