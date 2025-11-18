<?php

use App\Http\Controllers\Api\FactusApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/**
 * API Routes para el sistema POS
 * Prefijo automático: /api
 */

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// API endpoints para Factus (facturación electrónica)
Route::prefix('factus')->middleware(['auth:sanctum'])->group(function () {
    // Listar facturas
    Route::get('/invoices', [FactusApiController::class, 'index']);
    
    // Crear nueva factura
    Route::post('/invoices', [FactusApiController::class, 'store']);
    
    // Ver detalle de factura
    Route::get('/invoices/{invoice}', [FactusApiController::class, 'show']);
    
    // Enviar factura a Factus
    Route::post('/invoices/{invoice}/send', [FactusApiController::class, 'sendToFactus']);
    
    // Obtener estado de envío
    Route::get('/invoices/{invoice}/status', [FactusApiController::class, 'getStatus']);
});

// API endpoints públicos (sin autenticación)
Route::prefix('public')->group(function () {
    // Webhook para recibir respuestas de Factus
    Route::post('/factus/webhook', [FactusApiController::class, 'webhook']);
});