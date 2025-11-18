@extends('layouts.main')

@section('titulo', 'Facturas - Factus')

@section('contenido')
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Facturas Electrónicas</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active">Facturas</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Lista de Facturas</h5>

            @if(session('success'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif

            <div class="mb-3">
              <a href="{{ route('factus.invoices.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Nueva factura
              </a>
            </div>

            <div class="table-responsive">
              <table class="table datatable">
                <thead>
                  <tr>
                    <th><b>N°</b> Factura</th>
                    <th>Fecha</th>
                    <th>NIT</th>
                    <th>Empresa</th>
                    <th>Total</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($invoices as $inv)
                    <tr>
                      <td><strong>{{ $inv->invoice_number }}</strong></td>
                      <td>{{ $inv->issued_at->format('d/m/Y H:i') }}</td>
                      <td>{{ $inv->nit }}</td>
                      <td>{{ $inv->company_name }}</td>
                      <td>${{ number_format($inv->total, 2) }}</td>
                      <td>
                        <a href="{{ route('factus.invoices.show', $inv) }}" class="btn btn-sm btn-info">
                          <i class="bi bi-eye"></i> Ver
                        </a>
                      </td>
                    </tr>
                  @empty
                    <tr>
                      <td colspan="6" class="text-center">No hay facturas registradas.</td>
                    </tr>
                  @endforelse
                </tbody>
              </table>
            </div>

            {{ $invoices->links() }}

          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->
@endsection
