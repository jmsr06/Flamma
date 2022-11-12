<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->char('referencia', 5)->primary();
            $table->string('nombre',70)->unique();
            $table->string('slug',100)->unique();
            $table->unsignedTinyInteger('id_categoria');
            $table->unsignedTinyInteger('id_coleccion');
            $table->text('descripcion');
            $table->decimal('precio', 10, 0);
            $table->decimal('descuento', 3, 2)->default(0);
            $table->string('guia_tallas_img',100)->nullable();
            $table->softDeletes('deleted_at', 0);
            $table->timestamps();
            $table->foreign('id_categoria')->references('id')->on('categorias');
            $table->foreign('id_coleccion')->references('id')->on('colecciones');
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
