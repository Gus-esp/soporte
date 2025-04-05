<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalidaInventario extends Model
{
    use HasFactory;

    protected $table = 'salidas_inventario'; 

    protected $fillable = ['inventario_id', 'cantidad_salida', 'sucursal'];

    public function inventario()
    {
        return $this->belongsTo(Inventario::class, 'inventario_id');
    }
    public function producto()
{
    return $this->belongsTo(Inventario::class, 'inventario_id');
}

}
