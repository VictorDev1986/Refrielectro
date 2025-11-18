<?php

namespace App\Http\Controllers;

use App\Models\FactusInvoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Barryvdh\DomPDF\Facade\Pdf;

class FactusInvoiceController extends Controller
{
    /** Listar facturas */
    public function index()
    {
        $invoices = FactusInvoice::orderBy('issued_at', 'desc')->paginate(15);
        return view('factus_invoices.index', compact('invoices'));
    }

    /** Mostrar formulario de creación */
    public function create()
    {
        return view('factus_invoices.create');
    }

    /** Guardar nueva factura */
    public function store(Request $request)
    {
        $data = $request->validate([
            'invoice_number' => 'required|string|max:255|unique:factus_invoices,invoice_number',
            'issued_at' => 'required|date',
            'nit' => 'required|string|max:50',
            'company_name' => 'required|string|max:255',
            'total' => 'required|numeric',
        ]);

        $invoice = FactusInvoice::create($data);

        // Preparar JSON para Factus y guardarlo en la columna json_payload
        $payload = $this->prepareFactusPayload($invoice);
        $invoice->json_payload = $payload;
        $invoice->save();

        // Ejemplo: enviar a Factus si está configurado (no obligatorio)
        try {
            if (config('app.env') !== 'testing') {
                $response = $this->sendToFactusApi($invoice);
                // Guardar respuesta en logs; opcional: almacenar en DB
                Log::info('Factus API response', ['resp' => $response]);
            }
        } catch (\Exception $e) {
            Log::error('Error sending to Factus API: ' . $e->getMessage());
        }

        return redirect()->route('factus.invoices.index')
            ->with('success', 'Factura creada correctamente.');
    }

    /**
     * Ver detalle de una factura */
    public function show(FactusInvoice $invoice)
    {
        return view('factus_invoices.show', compact('invoice'));
    }

    /**
     * Generar PDF de la factura
     */
    public function generatePDF(FactusInvoice $invoice)
    {
        $pdf = Pdf::loadView('factus_invoices.pdf', compact('invoice'));
        
        return $pdf->download('factura_' . $invoice->invoice_number . '.pdf');
    }

    /**
     * Generar Excel de la factura
     */
    public function generateExcel(FactusInvoice $invoice)
    {
        // Aquí podrías usar Laravel Excel si está instalado
        // Por ahora, creamos un CSV simple
        $csvData = [
            ['Campo', 'Valor'],
            ['Número de Factura', $invoice->invoice_number],
            ['Fecha de Emisión', $invoice->issued_at->format('d/m/Y H:i')],
            ['NIT', $invoice->nit],
            ['Empresa', $invoice->company_name],
            ['Total', $invoice->total],
        ];

        $filename = 'factura_' . $invoice->invoice_number . '.csv';
        
        $handle = fopen('php://temp', 'r+');
        foreach ($csvData as $row) {
            fputcsv($handle, $row);
        }
        rewind($handle);
        $csv = stream_get_contents($handle);
        fclose($handle);

        return response($csv, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ]);
    }

    /** Preparar payload para Factus (JSON) */
    protected function prepareFactusPayload(FactusInvoice $invoice)
    {
        $payload = [
            'invoice' => [
                'number' => $invoice->invoice_number,
                'issued_at' => $invoice->issued_at->toIso8601String(),
                'customer_nit' => $invoice->nit,
                'company_name' => $invoice->company_name,
                'total' => (float) $invoice->total,
            ],
        ];

        return $payload;
    }

    /** Ejemplo de método para enviar la factura a la API de Factus */
    protected function sendToFactusApi(FactusInvoice $invoice)
    {
        $apiUrl = env('FACTUS_API_URL');
        $apiKey = env('FACTUS_API_KEY');

        $payload = $this->prepareFactusPayload($invoice);

        if (empty($apiUrl) || empty($apiKey)) {
            // Si no hay configuración, devolvemos solo el payload preparado
            return ['ok' => false, 'reason' => 'API not configured', 'payload' => $payload];
        }

        // Ejemplo usando el cliente HTTP de Laravel
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $apiKey,
            'Accept' => 'application/json',
        ])->post($apiUrl, $payload);

        // Retornamos un array con el estado y contenido (seguro para logs)
        if ($response->successful()) {
            return ['ok' => true, 'status' => $response->status(), 'body' => $response->json()];
        }

        return ['ok' => false, 'status' => $response->status(), 'body' => $response->body()];
    }
}
