<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCostoEstimadoToReparacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::table('reparaciones', function (Blueprint $table) {
        if (!Schema::hasColumn('reparaciones', 'costo_estimado')) {
            $table->decimal('costo_estimado', 8, 2)->after('costo_repuesto')->nullable();
        }
    });
}
public function down()
{
    Schema::table('reparaciones', function (Blueprint $table) {
        $table->dropColumn('costo_estimado');
    });
}
}
