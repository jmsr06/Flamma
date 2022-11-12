<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('destinatario',80);
            $table->string('cedula',10);
            $table->string('telefono',10);
            $table->string('direccion',70);
            $table->string('especificacion',50);
            $table->decimal('descuento', 8, 0);
            $table->enum('estado', ['no enviado', 'enviado', 'recibido']);
            $table->char('nro_seguimiento',15);
            $table->UnsignedBigInteger('id_usuario');
            $table->UnsignedSmallInteger('id_ciudad');
            $table->timestamps();
            $table->foreign('id_usuario')->references('id')->on('users');
            $table->foreign('id_ciudad')->references('id')->on('ciudades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
}
