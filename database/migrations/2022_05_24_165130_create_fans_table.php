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
        Schema::create('fans', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable('false');
            $table->string('apellidos')->nullable('false');
            $table->string('nick');
            $table->string('email')->nullable('false');
            $table->string('password')->nullable('false');
            $table->date('fecha_nac');
            $table->integer('user')->default(0);
            $table->string('id_proyectos_mg')->default("");

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
        Schema::dropIfExists('fans');
    }
};
