<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresa', function (Blueprint $table) {
            $table->increments('id_empresa');
            $table->string('nit', 45);
            $table->string('razon_social', 45);
            $table->string('correo_corporativo', 45);
            $table->string('gerente', 45);
            $table->string('telefono', 45);
            $table->string('pais', 35);
            $table->string('ciudad', 35);
            $table->string('nom_talento_humano', 45);
            $table->string('descripcion_empresa', 45);
            
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
        Schema::dropIfExists('empresa');
    }
}
