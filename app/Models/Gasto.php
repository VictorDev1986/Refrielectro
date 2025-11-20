<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gasto extends Model
{
    use HasFactory;

    public const CATEGORIAS = [
        'presupuesto' => 'Presupuesto',
        'gastos_compra_insumos' => 'Gastos de compra de insumos',
        'gastos_repuestos' => 'Gastos de repuestos',
        'caja_menor' => 'Caja menor',
        'transporte' => 'Transporte',
        'sueldos' => 'Sueldos',
        'planillas_seguridad_social' => 'Planillas de seguridad social',
        'otros_gastos_operativos' => 'Otros gastos operativos',
    ];

    protected $table = 'gastos';

    protected $fillable = [
        'categoria',
        'descripcion',
        'monto',
        'fecha',
        'venta_id',
    ];

    protected $casts = [
        'fecha' => 'date',
        'monto' => 'decimal:2',
    ];

    public function venta()
    {
        return $this->belongsTo(Venta::class);
    }
}
