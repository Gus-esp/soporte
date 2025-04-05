<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalidasInventarioTable extends Migration
{
    public function up()
    {
        Schema::create('salidas_inventario', function (Blueprint $table) {
            $table->id();
            $table->foreignId('inventario_id')->constrained()->onDelete('cascade');
            $table->integer('cantidad')->default(0);  // Cantidad retirada
            $table->string('sucursal');  // Sucursal destino
            $table->date('fecha_salida')->nullable();// Fecha de la salida
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('salidas_inventario');
    }
}
