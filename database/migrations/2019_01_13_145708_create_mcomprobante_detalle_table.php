<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMcomprobanteDetalleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mcomprobante_detalle', function (Blueprint $table) {
            $table->integer('comprobantes_id')->unsigned();
            $table->integer('mecanica_id')->unsigned();
            $table->decimal('precio_unitario', 10,2);
            $table->decimal('total', 10,2);
            $table->timestamps();

            //Relaciones

            $table->foreign('comprobantes_id')->references('id')->on('mcomprobantes')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
        
            $table->foreign('mecanica_id')->references('id')->on('mecanicas')
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
        Schema::dropIfExists('mcomprobante_detalle');
    }
}
