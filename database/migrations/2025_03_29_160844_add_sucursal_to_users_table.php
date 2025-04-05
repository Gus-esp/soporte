<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSucursalAndRolToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Agregar la columna 'sucursal' con valor predeterminado 'lapaz'
            $table->string('sucursal')->after('password')->default('lapaz');
            
            // Agregar la columna 'rol' con valor predeterminado 'empleado'
            $table->string('rol')->after('sucursal')->default('empleado');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Eliminar las columnas 'sucursal' y 'rol'
            $table->dropColumn(['sucursal', 'rol']);
        });
    }
}
