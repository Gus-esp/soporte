<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('celulares', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_recepcion');
            $table->date('fecha_entrega');
            $table->string('nombre_cliente');
            $table->string('telefono');
            $table->string('marca');
            $table->text('motivo');
            $table->decimal('costo_reparacion', 10, 2);
            $table->decimal('costo_repuestos', 10, 2);
            $table->enum('estado', ['pendiente', 'en_proceso', 'finalizado'])->default('pendiente');
            $table->decimal('ganancia', 10, 2);
            $table->string('sucursal'); // Asegúrate de que esta columna existe
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('celulares');
    }    
};
