<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDniToAlumnos extends Migration
{
    public function up()
    {
        Schema::table('alumnos', function (Blueprint $table) {
            $table->string('dni')->default('1')->after('apellido'); // Ajusta el tipo y la posición según tus necesidades
        });
    }

    public function down()
    {
        Schema::table('alumnos', function (Blueprint $table) {
            $table->dropColumn('dni');
        });
    }
}

