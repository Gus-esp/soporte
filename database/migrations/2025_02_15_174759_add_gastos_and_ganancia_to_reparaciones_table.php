<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('reparaciones', function (Blueprint $table) {
            if (!Schema::hasColumn('reparaciones', 'gastos')) {
                $table->decimal('gastos', 10, 2)->default(0);
            }
            if (!Schema::hasColumn('reparaciones', 'ganancia')) {
                $table->decimal('ganancia', 10, 2)->default(0);
            }
        });
    }

    public function down()
    {
        Schema::table('reparaciones', function (Blueprint $table) {
            if (Schema::hasColumn('reparaciones', 'gastos')) {
                $table->dropColumn('gastos');
            }
            if (Schema::hasColumn('reparaciones', 'ganancia')) {
                $table->dropColumn('ganancia');
            }
        });
    }
};
