<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resume_data', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellidop');
            $table->string('apellidom');
            $table->string('carnet');
            $table->string('correo');
            $table->string('mension');
            $table->string('direccion');
            $table->string('celular');
            $table->string('nacimientof');
            $table->string('nacimientol');
            $table->string('sexo');
            $table->string('telefono');
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
        Schema::dropIfExists('resume_data');
    }
};
