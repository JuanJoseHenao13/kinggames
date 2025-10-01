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
        Schema::table('proveedores', function (Blueprint $table) {
            // Drop old columns
            $table->dropColumn(['contacto', 'email']);

            // Add new columns for Colombia
            $table->string('descripcion', 255)->nullable()->after('nombre')->comment('Descripción del proveedor');
            $table->string('nit', 50)->nullable()->after('descripcion')->comment('Número de identificación tributaria');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('proveedores', function (Blueprint $table) {
            // Drop new columns
            $table->dropColumn(['descripcion', 'nit']);

            // Restore old columns
            $table->string('contacto', 100)->nullable()->after('nombre');
            $table->string('email', 100)->nullable()->after('telefono');
        });
    }
};
