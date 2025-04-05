<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', // ID para diferenciar productos
        'tipo_producto',
        'modelo',
        'descripcion',
        'cantidad',
        'precio_unitario',
    ];

    // Relación con las salidas
    public function salidas()
    {
        return $this->hasMany(SalidaInventario::class, 'inventario_id');
    }
}





