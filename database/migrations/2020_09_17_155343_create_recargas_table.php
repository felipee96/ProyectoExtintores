<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecargasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recargas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nro_tiquete_anterior');
            $table->integer('nro_tiquete_nuevo');
            $table->integer('nro_extintor');
            $table->integer('capacidad');
            $table->string('agente')->nullable();
            $table->unsignedInteger('usuario_recarga_id');
            $table->unsignedInteger('ingreso_recarga_id');
            $table->unsignedInteger('activida_recarga_id');
            $table->unsignedInteger('cambio_parte_id');
            $table->unsignedInteger('prueba_id');
            $table->unsignedInteger('fuga_id');
            $table->string('observacion');
            $table->timestamps();

            #LLaves foreneas 
            $table->foreign('usuario_recarga_id')->references('id')->on('users');
            $table->foreign('ingreso_recarga_id')->references('id')->on('ingresos');
            $table->foreign('activida_recarga_id')->references('id')->on('actividades');
            $table->foreign('cambio_parte_id')->references('id')->on('cambio_parte_extintor');
            $table->foreign('prueba_id')->references('id')->on('pruebas');
            $table->foreign('fuga_id')->references('id')->on('fugas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recargas');
    }
}
