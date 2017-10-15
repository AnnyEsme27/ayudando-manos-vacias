<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableNino extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nino', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('sexo');
            $table->date('fecha_nacimiento');
            $table->string('situacion_actual');
            $table->string('relacion_repr');
            $table->string('identificacion')->nullable();
            $table->string('representante_ci', 20);
            $table->timestamps();
        });

        Schema::table('nino', function(Blueprint $table) {
            $table->foreign('representante_ci')->references('ci')->on('representante');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('nino');
    }
}
