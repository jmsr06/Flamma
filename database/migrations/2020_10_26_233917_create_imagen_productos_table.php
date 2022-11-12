<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagenProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imagen_productos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('referencia', 5);
            $table->string('nombre_imagen',100)->unique();
            $table->string('descripcion',70);
            $table->UnsignedTinyInteger('prioridad');
            $table->unique(['referencia','nombre_imagen']);
            $table->timestamps();
            $table->foreign('referencia')->references('referencia')->on('productos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('imagen_productos');
    }
}
