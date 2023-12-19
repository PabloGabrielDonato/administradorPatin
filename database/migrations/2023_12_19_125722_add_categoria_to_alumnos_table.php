<?php

// database/migrations/XXXX_XX_XX_add_categoria_to_alumnos_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoriaToAlumnosTable extends Migration
{
    public function up()
    {
        Schema::table('alumnos', function (Blueprint $table) {
            $table->string('categoria')->nullable(); // Ajusta según tus necesidades
        });
    }

    public function down()
    {
        Schema::table('alumnos', function (Blueprint $table) {
            $table->dropColumn('categoria');
        });
    }
}

