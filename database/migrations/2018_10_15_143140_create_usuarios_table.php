<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('id_usuario');
            $table->bigInteger('num_iden')->unique();
            $table->string('nombres',45);
            $table->string('apellidos',45);
            $table->string('email',45);
            $table->text('password');
            $table->string('telefono',45);
            $table->string('direccion',100);
            $table->date('fech_nacimiento');
            $table->integer('id_rol');
            $table->integer('id_deporte');
            $table->integer('id_cat_dep');
            $table->integer('id_profesion');
            $table->integer('peso');
            $table->string('estatura',10);
            $table->string('enfermedades',200);
            $table->string('alergias',200);
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
        Schema::dropIfExists('usuarios');
    }
}
