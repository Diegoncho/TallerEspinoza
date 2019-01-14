<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompraDetalleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compra_detalle', function (Blueprint $table) {
            $table->integer('compras_id')->unsigned();
            $table->integer('producto_id')->unsigned();
            $table->integer('cantidad');
            $table->decimal('precio_unitario', 10,2);
            $table->decimal('total', 10,2);
            $table->timestamps();

            //Relaciones

            $table->foreign('compras_id')->references('id')->on('compras')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
        
            $table->foreign('producto_id')->references('id')->on('productos')
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
        Schema::dropIfExists('compra_detalle');
    }
}
