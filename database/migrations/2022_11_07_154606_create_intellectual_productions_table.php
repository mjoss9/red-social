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
        Schema::create('intellectual_productions', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('universidad');
            $table->string('añoe');
            $table->string('paginas');
            $table->string('nregistro');
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
        Schema::dropIfExists('intellectual_productions');
    }
};
