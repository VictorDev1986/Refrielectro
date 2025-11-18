<?php

use App\Http\Controllers\Api\FactusApiController;
use Illuminate\Support\Facades\Route;

/**
 * API Routes específicas para Factus
 * Estas rutas deben ser incluidas en web.php o api.php
 */

// Rutas API REST para Factus
Route::prefix('api/v1/factus')->middleware(['auth:sanctum'])->group(function () {
    // CRUD de facturas
    Route::apiResource('invoices', FactusApiController::class);
    
    // Acciones específicas
    Route::post('invoices/{invoice}/send', [FactusApiController::class, 'sendToFactus']);
    Route::get('invoices/{invoice}/status', [FactusApiController::class, 'getStatus']);
});

// Webhooks públicos (sin autenticación)
Route::prefix('api/webhooks')->group(function () {
    Route::post('factus', [FactusApiController::class, 'webhook']);
});