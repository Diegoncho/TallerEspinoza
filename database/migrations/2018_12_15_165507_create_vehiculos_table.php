<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('marca_id')->unsigned();
            $table->integer('modelo_id')->unsigned();
            $table->string('color',255);
            $table->string('matricula',255);
            $table->integer('anio');
            $table->timestamps();

            //Relaciones

            $table->foreign('marca_id')->references('id')->on('vmarcas')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('modelo_id')->references('id')->on('modelos')
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
        Schema::dropIfExists('vehiculos');
    }
}
