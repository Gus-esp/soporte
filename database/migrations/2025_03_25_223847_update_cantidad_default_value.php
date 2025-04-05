<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCantidadDefaultValue extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('salidas_inventario', function (Blueprint $table) {
            $table->integer('cantidad')->default(0)->change();
        });
    }
    
    public function down()
    {
        Schema::table('salidas_inventario', function (Blueprint $table) {
            $table->integer('cantidad')->nullable(false)->change();
        });
    }
}