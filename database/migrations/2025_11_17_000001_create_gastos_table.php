<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('gastos', function (Blueprint $table) {
            $table->id();
            $table->enum('categoria', [
                'presupuesto',
                'gastos_compra_insumos',
                'gastos_repuestos',
                'caja_menor',
                'transporte',
                'sueldos',
                'planillas_seguridad_social',
                'otros_gastos_operativos',
            ]);
            $table->string('descripcion');
            $table->decimal('monto', 12, 2);
            $table->date('fecha');
            $table->foreignId('venta_id')->nullable()->constrained('ventas')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gastos');
    }
};
