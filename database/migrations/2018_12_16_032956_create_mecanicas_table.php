<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMecanicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mecanicas', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha_recibido');
            $table->date('fecha_entrega');
            $table->text('diagnostico');
            $table->text('cambios_repuestos');
            $table->integer('empleado_id')->unsigned();
            $table->float('total_repuesto');
            $table->float('total_mano_obra');
            $table->timestamps();

            //Relaciones

            $table->foreign('empleado_id')->references('id')->on('empleados')
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
        Schema::dropIfExists('mecanicas');
    }
}
