<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FactusInvoice;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class FactusApiController extends Controller
{
    /**
     * Listar facturas (API)
     */
    public function index(Request $request): JsonResponse
    {
        $perPage = $request->get('per_page', 15);
        $invoices = FactusInvoice::orderBy('issued_at', 'desc')->paginate($perPage);
        
        return response()->json([
            'success' => true,
            'data' => $invoices
        ]);
    }

    /**
     * Crear nueva factura (API)
     */
    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'invoice_number' => 'required|string|max:255|unique:factus_invoices,invoice_number',
            'issued_at' => 'required|date',
            'nit' => 'required|string|max:50',
            'company_name' => 'required|string|max:255',
            'total' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $invoice = FactusInvoice::create($validator->validated());

        // Preparar JSON para Factus
        $payload = $this->prepareFactusPayload($invoice);
        $invoice->json_payload = $payload;
        $invoice->save();

        return response()->json([
            'success' => true,
            'message' => 'Factura creada correctamente',
            'data' => $invoice
        ], 201);
    }

    /**
     * Ver detalle de factura (API)
     */
    public function show(FactusInvoice $invoice): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => $invoice
        ]);
    }

    /**
     * Enviar factura a Factus API
     */
    public function sendToFactus(FactusInvoice $invoice): JsonResponse
    {
        try {
            $response = $this->sendToFactusApi($invoice);
            
            return response()->json([
                'success' => $response['ok'],
                'message' => $response['ok'] ? 'Factura enviada correctamente' : 'Error al enviar factura',
                'factus_response' => $response
            ]);
            
        } catch (\Exception $e) {
            Log::error('Error sending to Factus API: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Error interno al enviar factura',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Obtener estado de una factura
     */
    public function getStatus(FactusInvoice $invoice): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => [
                'invoice_number' => $invoice->invoice_number,
                'issued_at' => $invoice->issued_at,
                'total' => $invoice->total,
                'has_payload' => !empty($invoice->json_payload),
                'created_at' => $invoice->created_at,
                'updated_at' => $invoice->updated_at
            ]
        ]);
    }

    /**
     * Webhook para recibir respuestas de Factus
     */
    public function webhook(Request $request): JsonResponse
    {
        Log::info('Factus webhook received', $request->all());
        
        // Aquí procesarías la respuesta de Factus
        // Por ejemplo, actualizar el estado de la factura
        
        return response()->json([
            'success' => true,
            'message' => 'Webhook processed'
        ]);
    }

    /**
     * Preparar payload para Factus (reutilizado del controlador web)
     */
    protected function prepareFactusPayload(FactusInvoice $invoice): array
    {
        return [
            'invoice' => [
                'number' => $invoice->invoice_number,
                'issued_at' => $invoice->issued_at->toIso8601String(),
                'customer_nit' => $invoice->nit,
                'company_name' => $invoice->company_name,
                'total' => (float) $invoice->total,
            ],
        ];
    }

    /**
     * Enviar a API de Factus (reutilizado del controlador web)
     */
    protected function sendToFactusApi(FactusInvoice $invoice): array
    {
        $apiUrl = env('FACTUS_API_URL');
        $apiKey = env('FACTUS_API_KEY');

        $payload = $this->prepareFactusPayload($invoice);

        if (empty($apiUrl) || empty($apiKey)) {
            return ['ok' => false, 'reason' => 'API not configured', 'payload' => $payload];
        }

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $apiKey,
            'Accept' => 'application/json',
        ])->post($apiUrl, $payload);

        if ($response->successful()) {
            return ['ok' => true, 'status' => $response->status(), 'body' => $response->json()];
        }

        return ['ok' => false, 'status' => $response->status(), 'body' => $response->body()];
    }
}