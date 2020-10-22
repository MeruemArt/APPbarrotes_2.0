<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevolucionTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devolucion', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('codigo_fact');
            $table->dateTime('fecha');
            $table->integer('unidades');
            $table->double('total');
            $table->string('Motivo');
            $table->integer('user_id');
            $table->integer('pedido_id');
            $table->integer('proveedores_id');
            $table->integer('cliente_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('devolucion');
    }
}
