<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',255);
            $table->integer('marca_id')->unsigned();
            $table->text('descripcion');
            $table->string('estado',255);
            $table->integer('cantidad');
            $table->float('precio_costo');
            $table->float('precio_mayoreo');
            $table->float('precio_regular');
            $table->timestamps();

            //Relaciones

            $table->foreign('marca_id')->references('id')->on('pmarcas')
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
        Schema::dropIfExists('productos');
    }
}
