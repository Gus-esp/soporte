<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReparacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('reparaciones', function (Blueprint $table) {
        $table->id();
        $table->string('nombre_cliente');
        $table->string('telefono_cliente');
        $table->string('marca_celular');
        $table->string('modelo_celular');
        $table->text('descripcion_problema');
        $table->decimal('costo_reparacion', 8, 2);
        $table->decimal('costo_repuesto', 8, 2);
        $table->decimal('ganancia', 8, 2)->nullable();
        $table->decimal('costo_estimado', 8, 2); 
        $table->enum('estado', ['Pendiente', 'En revisión', 'Reparado', 'Entregado'])->default('Pendiente');
        $table->timestamp('fecha_recepcion')->nullable();
        $table->timestamp('fecha_entrega')->nullable();
        $table->unsignedBigInteger('sucursal_id');
        $table->timestamps();

        //clave foránea a la tabla de sucursales
        $table->foreign('sucursal_id')->references('id')->on('sucursales');
    });
}
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reparaciones');
    }
}
