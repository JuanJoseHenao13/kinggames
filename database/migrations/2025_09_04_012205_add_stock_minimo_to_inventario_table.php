<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inventario', function (Blueprint $table) {
            if (!Schema::hasColumn('inventario', 'stock')) {
                $table->integer('stock')->default(0)->after('id_producto');
            }
            if (!Schema::hasColumn('inventario', 'stock_minimo')) {
                $table->integer('stock_minimo')->default(0)->after('stock');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('inventario', function (Blueprint $table) {
            if (Schema::hasColumn('inventario', 'stock_minimo')) {
                $table->dropColumn('stock_minimo');
            }
            if (Schema::hasColumn('inventario', 'stock')) {
                $table->dropColumn('stock');
            }
        });
    }
};
