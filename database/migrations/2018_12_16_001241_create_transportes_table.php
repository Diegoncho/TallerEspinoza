<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransportesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transportes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fecha_inicio',255);
            $table->string('fecha_fin',255);
            $table->string('destino',255);
            $table->integer('empleado_id')->unsigned();
            $table->integer('vehiculo_id')->unsigned();
            $table->string('carga',255);
            $table->timestamps();

            //Relaciones

            $table->foreign('empleado_id')->references('id')->on('empleados')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            
            $table->foreign('vehiculo_id')->references('id')->on('vehiculos')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transportes');
    }
}
