@extends('layouts.main')

@section('titulo', 'Factura ' . $invoice->invoice_number)

@section('contenido')
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Factura {{ $invoice->invoice_number }}</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('factus.invoices.index') }}">Facturas</a></li>
        <li class="breadcrumb-item active">{{ $invoice->invoice_number }}</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-8 mx-auto">

        <!-- Información de la Factura -->
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Información de la Factura</h5>

            <div class="row mb-3">
              <div class="col-12">
                <a href="{{ route('factus.invoices.index') }}" class="btn btn-secondary">
                  <i class="bi bi-arrow-left"></i> Volver al listado
                </a>
                
                <!-- Banner de exportación -->
                <div class="btn-group ms-2" role="group">
                  <a href="{{ route('factus.invoices.pdf', $invoice) }}" class="btn btn-outline-danger" target="_blank">
                    <i class="bi bi-file-pdf"></i> Descargar PDF
                  </a>
                  <a href="{{ route('factus.invoices.excel', $invoice) }}" class="btn btn-outline-success">
                    <i class="bi bi-file-excel"></i> Descargar Excel
                  </a>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <table class="table table-borderless">
                  <tr>
                    <th width="40%">Número:</th>
                    <td><strong class="text-primary">{{ $invoice->invoice_number }}</strong></td>
                  </tr>
                  <tr>
                    <th>Fecha:</th>
                    <td>{{ $invoice->issued_at->format('d/m/Y H:i') }}</td>
                  </tr>
                  <tr>
                    <th>NIT:</th>
                    <td>{{ $invoice->nit }}</td>
                  </tr>
                  <tr>
                    <th>Empresa:</th>
                    <td>{{ $invoice->company_name }}</td>
                  </tr>
                  <tr>
                    <th>Total:</th>
                    <td><strong class="text-success">${{ number_format($invoice->total, 2) }}</strong></td>
                  </tr>
                </table>
              </div>

              <div class="col-md-6">
                <div class="card bg-light">
                  <div class="card-body">
                    <h6 class="card-title">Estado de la Factura</h6>
                    <p class="card-text">
                      <span class="badge bg-info">Creada</span><br>
                      <small class="text-muted">
                        Registrada el {{ $invoice->created_at->format('d/m/Y H:i') }}
                      </small>
                    </p>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>

        <!-- Payload JSON -->
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Datos preparados para Factus API</h5>
            <p class="text-muted">Este es el payload JSON que se enviará a la API de Factus:</p>
            
            <div class="bg-light p-3 rounded">
              <pre class="mb-0"><code>{{ json_encode($invoice->json_payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) }}</code></pre>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->
@endsection
