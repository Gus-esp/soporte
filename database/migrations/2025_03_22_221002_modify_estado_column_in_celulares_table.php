<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyEstadoColumnInCelularesTable extends Migration
{
    public function up()
    {
        Schema::table('celulares', function (Blueprint $table) {
           
            $table->string('estado')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('celulares', function (Blueprint $table) {
        
            $table->string('estado')->default('pendiente')->change();
        });
    }
}

