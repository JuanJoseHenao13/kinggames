<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table = 'proveedores';
    protected $primaryKey = 'id_proveedor';

    protected $fillable = [
        'nombre', 'descripcion', 'nit', 'direccion', 'telefono'
    ];

    public function productos()
    {
        return $this->hasMany(Producto::class, 'id_proveedor');
    }

    public function transacciones()
    {
        return $this->hasMany(Transaccion::class, 'id_proveedor');
    }

    public function getRouteKeyName()
    {
        return 'id_proveedor';
    }
}