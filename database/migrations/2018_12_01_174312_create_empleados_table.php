<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombres',255);
            $table->string('apellidos',255);
            $table->text('direccion');
            $table->string('telefono',10);
            $table->string('edad',5);
            $table->string('fecha_nac',255);
            $table->string('estado_civil',255);
            $table->string('sexo',255);
            $table->integer('departamento_id')->unsigned();
            $table->string('dui',20);
            $table->string('nit',20);
            $table->string('afp',255);
            $table->string('email',255);
            $table->longText('img');
            $table->timestamps();

            //Relaciones

            $table->foreign('departamento_id')->references('id')->on('departamentos')
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
        Schema::dropIfExists('empleados');
    }
}
