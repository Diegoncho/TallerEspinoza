<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCabecerafacturaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cabecerafactura', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fecha',255);
            $table->integer('cliente_id')->unsigned();
            $table->timestamps();

            //Relaciones
            
            $table->foreign('cliente_id')->references('id')->on('clientes')
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
        Schema::dropIfExists('cabecerafactura');
    }
}
