<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNinoMedicamentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nino_medicamento', function(Blueprint $table) {
            $table->integer('id');
            $table->date('fecha');
            $table->string('estado_requerimiento');
            $table->string('nombre_otro')->nullable();
            $table->integer('cantidad');
            $table->integer('nino_id')->unsigned();
            $table->integer('medicamento_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('nino_medicamento', function(Blueprint $table) {
            $table->foreign('nino_id')->references('id')->on('nino')->onDelete('cascade');
            $table->foreign('medicamento_id')->references('id')->on('medicamento');
            $table->primary(["id", "nino_id", "medicamento_id"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('nino_medicamento');
    }
}
