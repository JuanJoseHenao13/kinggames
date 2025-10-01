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
        Schema::create('proveedores', function (Blueprint $table) {
            $table->id('id_proveedor');
            $table->string('nombre', 100)->comment('Nombre del proveedor');
            $table->string('descripcion', 255)->nullable()->comment('Descripción del proveedor');
            $table->string('nit', 50)->nullable()->comment('Número de identificación tributaria');
            $table->string('direccion', 255)->nullable()->comment('Dirección del proveedor');
            $table->string('telefono', 20)->nullable()->comment('Teléfono de contacto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proveedores');
    }
};
