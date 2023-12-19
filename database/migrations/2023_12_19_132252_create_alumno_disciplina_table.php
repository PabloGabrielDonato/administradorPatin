<?php
// database/migrations/xxxx_xx_xx_create_alumno_disciplina_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnoDisciplinaTable extends Migration
{
    public function up()
    {
        Schema::create('alumno_disciplina', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('alumno_id');
            $table->unsignedBigInteger('disciplina_id');
            $table->timestamps();

            $table->foreign('alumno_id')->references('id')->on('alumnos')->onDelete('cascade');
            $table->foreign('disciplina_id')->references('id')->on('disciplinas')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('alumno_disciplina');
    }
}

