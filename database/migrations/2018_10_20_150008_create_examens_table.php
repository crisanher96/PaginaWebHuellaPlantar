<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examens', function (Blueprint $table) {
            $table->increments('id_examen');
            $table->integer('id_paciente');
            $table->integer('id_enc_exa');
            $table->date('fecha');
            $table->integer('indice_izq');
            $table->integer('indice_der');
            $table->string('clasi_izq',20);
            $table->string('clasi_der',20);
            $table->string('imagen_original',150);
            $table->string('imagen_izq',150);
            $table->string('imagen_der',150);
            $table->float('vx_izq');
            $table->float('vy_izq');
            $table->float('vx_der');
            $table->float('vy_der');
            $table->integer('estado_exa');
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
        Schema::dropIfExists('examens');
    }
}
