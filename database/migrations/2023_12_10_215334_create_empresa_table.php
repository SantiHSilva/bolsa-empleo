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
            $table->increments('id');

            $table->string('nit', 20)->unique();
            $table->string('nombre', 45);
            $table->string('ciudad', 100);
            $table->string('direccion', 200);
            $table->string('telefono', 20);
            $table->string('sector', 45);
            $table->string('descripcion', 300);

            $table->date('fecha_creacion');

            // Add this line to create the foreign key, and the relationship
            $table->unsignedInteger('users_id');
            $table->foreign('users_id')->references('id')->on('users');

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
