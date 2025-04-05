<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('inventarios', function (Blueprint $table) {
        $table->id();
        $table->string('tipo_producto');  // Material de oficina, pantalla, mica
        $table->string('modelo');
        $table->text('descripcion');
        $table->integer('cantidad');  // Cantidad disponible en inventario
        $table->decimal('precio_unitario', 10, 2);
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
    Schema::dropIfExists('inventarios');
}

}
