<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('celulares', function (Blueprint $table) {
            $table->decimal('ganancia', 10, 2)->default(0)->change();
        });
    }

    public function down()
    {
        Schema::table('celulares', function (Blueprint $table) {
            $table->decimal('ganancia', 10, 2)->nullable()->change();
        });
    }
};
