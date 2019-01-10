<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetallefacturaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detallefactura', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('producto_id')->unsigned()->nullable();
            $table->integer('mecanica_id')->unsigned()->nullable();
            $table->integer('factura_id')->unsigned();
            $table->integer('cantidad');
            $table->float('precio_factura');
            $table->timestamps();

            //Relaciones

            $table->foreign('producto_id')->references('id')->on('productos')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('mecanica_id')->references('id')->on('mecanicas')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('factura_id')->references('id')->on('cabecerafactura')
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
        Schema::dropIfExists('detallefactura');
    }
}
