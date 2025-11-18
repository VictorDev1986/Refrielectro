<?php

use App\Http\Controllers\FactusInvoiceController;
use Illuminate\Support\Facades\Route;

/**
 * Rutas para el módulo de facturación Factus
 * Prefijo: /factus
 * Names: factus.invoices.*
 */
Route::prefix('factus')->middleware('auth')->name('factus.')->group(function () {
    Route::get('/invoices', [FactusInvoiceController::class, 'index'])->name('invoices.index');
    Route::get('/invoices/create', [FactusInvoiceController::class, 'create'])->name('invoices.create');
    Route::post('/invoices', [FactusInvoiceController::class, 'store'])->name('invoices.store');
    Route::get('/invoices/{invoice}', [FactusInvoiceController::class, 'show'])->name('invoices.show');
    
    // Exportación y reportes
    Route::get('/invoices/{invoice}/pdf', [FactusInvoiceController::class, 'generatePDF'])->name('invoices.pdf');
    Route::get('/invoices/{invoice}/excel', [FactusInvoiceController::class, 'generateExcel'])->name('invoices.excel');
});
