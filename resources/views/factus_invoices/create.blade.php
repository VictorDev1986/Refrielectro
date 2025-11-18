@extends('layouts.main')

@section('titulo', 'Crear Factura - Factus')

@section('contenido')
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Nueva Factura Electrónica</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('factus.invoices.index') }}">Facturas</a></li>
        <li class="breadcrumb-item active">Crear</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-8 mx-auto">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Datos de la Factura</h5>

            @if ($errors->any())
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <h6>Por favor corrige los siguientes errores:</h6>
                <ul class="mb-0">
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif

            <!-- Formulario -->
            <form method="post" action="{{ route('factus.invoices.store') }}" class="row g-3 needs-validation" novalidate>
              @csrf

              <div class="col-md-6">
                <label for="invoice_number" class="form-label">Número de factura *</label>
                <input type="text" name="invoice_number" id="invoice_number" class="form-control" value="{{ old('invoice_number') }}" required>
                <div class="invalid-feedback">
                  Por favor ingresa el número de factura.
                </div>
              </div>

              <div class="col-md-6">
                <label for="issued_at" class="form-label">Fecha de emisión *</label>
                <input type="datetime-local" name="issued_at" id="issued_at" class="form-control" value="{{ old('issued_at', now()->format('Y-m-d\TH:i')) }}" required>
                <div class="invalid-feedback">
                  Por favor selecciona la fecha de emisión.
                </div>
              </div>

              <div class="col-md-6">
                <label for="nit" class="form-label">NIT del cliente *</label>
                <input type="text" name="nit" id="nit" class="form-control" value="{{ old('nit') }}" placeholder="Ej: 900123456-7" required>
                <div class="invalid-feedback">
                  Por favor ingresa el NIT del cliente.
                </div>
              </div>

              <div class="col-md-6">
                <label for="company_name" class="form-label">Nombre de la empresa *</label>
                <input type="text" name="company_name" id="company_name" class="form-control" value="{{ old('company_name') }}" placeholder="Empresa ABC S.A.S." required>
                <div class="invalid-feedback">
                  Por favor ingresa el nombre de la empresa.
                </div>
              </div>

              <div class="col-md-12">
                <label for="total" class="form-label">Total *</label>
                <div class="input-group">
                  <span class="input-group-text">$</span>
                  <input type="number" step="0.01" name="total" id="total" class="form-control" value="{{ old('total') }}" placeholder="0.00" required>
                  <div class="invalid-feedback">
                    Por favor ingresa el total de la factura.
                  </div>
                </div>
              </div>

              <div class="col-12">
                <button class="btn btn-primary" type="submit">
                  <i class="bi bi-check-circle"></i> Crear Factura
                </button>
                <a href="{{ route('factus.invoices.index') }}" class="btn btn-secondary">
                  <i class="bi bi-arrow-left"></i> Cancelar
                </a>
              </div>
            </form><!-- End Multi Columns Form -->

          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->

<script>
// Bootstrap validation
(function() {
  'use strict';
  window.addEventListener('load', function() {
    var forms = document.getElementsByClassName('needs-validation');
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
@endsection
