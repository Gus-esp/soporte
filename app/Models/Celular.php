<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Celular extends Model
{
    use HasFactory;

    protected $table = 'celulares'; // Asegúrate de que sea 'celulares'

    protected $fillable = [
        'fecha_recepcion',
        'fecha_entrega',
        'nombre_cliente',
        'telefono',
        'marca',
        'motivo',
        'costo_reparacion',
        'costo_repuestos',
        'estado',
        'ganancia',
        'sucursal', // Asegúrate de que este campo esté en la migración y en el modelo
    ];
}
