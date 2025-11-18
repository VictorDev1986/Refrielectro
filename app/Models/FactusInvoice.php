<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FactusInvoice extends Model
{
    use HasFactory;

    protected $table = 'factus_invoices';

    protected $fillable = [
        'invoice_number',
        'issued_at',
        'nit',
        'company_name',
        'total',
        'json_payload',
    ];

    protected $casts = [
        'issued_at' => 'datetime',
        'total' => 'decimal:2',
        'json_payload' => 'array',
    ];
}
