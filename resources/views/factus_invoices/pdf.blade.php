<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura {{ $invoice->invoice_number }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            font-size: 12px;
            line-height: 1.4;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #333;
            padding-bottom: 20px;
        }
        .company-info {
            text-align: center;
            margin-bottom: 30px;
        }
        .invoice-details {
            display: table;
            width: 100%;
            margin-bottom: 30px;
        }
        .invoice-details .left,
        .invoice-details .right {
            display: table-cell;
            width: 50%;
            vertical-align: top;
        }
        .invoice-details .right {
            text-align: right;
        }
        .invoice-info {
            background-color: #f8f9fa;
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
        }
        .total-section {
            text-align: right;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 2px solid #333;
        }
        .total-amount {
            font-size: 18px;
            font-weight: bold;
            color: #28a745;
        }
        .footer {
            margin-top: 50px;
            text-align: center;
            font-size: 10px;
            color: #666;
            border-top: 1px solid #ddd;
            padding-top: 20px;
        }
        h1 {
            color: #333;
            margin: 0;
        }
        h2 {
            color: #666;
            margin: 10px 0;
            font-size: 16px;
        }
        .label {
            font-weight: bold;
            color: #333;
        }
        .value {
            color: #666;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>REFRIELECTRO</h1>
        <h2>Factura Electrónica</h2>
    </div>

    <div class="invoice-details">
        <div class="left">
            <div class="invoice-info">
                <h3 style="margin-top: 0;">Información de la Factura</h3>
                <p><span class="label">Número:</span> <span class="value">{{ $invoice->invoice_number }}</span></p>
                <p><span class="label">Fecha de Emisión:</span> <span class="value">{{ $invoice->issued_at->format('d/m/Y H:i') }}</span></p>
            </div>
        </div>
        <div class="right">
            <div class="invoice-info">
                <h3 style="margin-top: 0;">Datos del Cliente</h3>
                <p><span class="label">NIT:</span> <span class="value">{{ $invoice->nit }}</span></p>
                <p><span class="label">Empresa:</span> <span class="value">{{ $invoice->company_name }}</span></p>
            </div>
        </div>
    </div>

    <div class="total-section">
        <p class="label">TOTAL A PAGAR:</p>
        <p class="total-amount">${{ number_format($invoice->total, 2) }}</p>
    </div>

    <div style="margin-top: 30px; padding: 15px; background-color: #e9ecef; border-radius: 5px;">
        <h4 style="margin-top: 0;">Datos para Factus API</h4>
        <p style="font-size: 10px; margin: 0;">Esta factura ha sido preparada para envío a través de la API de Factus.</p>
        <p style="font-size: 10px; margin: 0;"><strong>Estado:</strong> Registrada el {{ $invoice->created_at->format('d/m/Y H:i') }}</p>
    </div>

    <div class="footer">
        <p>Este documento fue generado automáticamente por el sistema POS - Refrielectro</p>
        <p>Factura generada el: {{ now()->format('d/m/Y H:i') }}</p>
    </div>
</body>
</html>