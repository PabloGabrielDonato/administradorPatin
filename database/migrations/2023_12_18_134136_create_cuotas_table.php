<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuotasTable extends Migration
{
    public function up()
{
    Schema::create('cuotas', function (Blueprint $table) {
        $table->id();
        $table->string('mes');
        $table->string('estado_pago', 20)->default('pendiente'); // Modifica la longitud según tus necesidades
        $table->unsignedBigInteger('alumno_id');
        $table->timestamps();

        $table->foreign('alumno_id')->references('id')->on('alumnos')->onDelete('cascade');
    });
}

    public function down()
    {
        Schema::dropIfExists('cuotas');
    }
}

