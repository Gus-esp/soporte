<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reparacion extends Model
{
    use HasFactory;
    protected $table = 'reparaciones';

    
    protected $fillable = [
        'nombre_cliente',
        'telefono_cliente',
        'modelo_celular',
        'descripcion_problema',
        'costo_estimado',
        'estado',
        'fecha_recepcion',
    ];
    
    // Método para calcular la ganancia automáticamente
    public function calcularGanancia()
    {
        $this->ganancia = $this->costo_estimado - $this->gastos;
        $this->save();
    }
    public function sucursal() {
        return $this->belongsTo(Sucursal::class);
    }
    
}
