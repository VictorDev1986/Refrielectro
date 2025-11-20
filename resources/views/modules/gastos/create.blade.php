@extends('layouts.main')

@section('titulo', $titulo)

@section('contenido')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Registrar gasto</h1>
  </div>

  <section class="section">
    <div class="row">
      <div class="col-lg-10">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Nuevo registro</h5>

            <form action="{{ route('gastos.store') }}" method="POST">
              @csrf
              @include('modules.gastos.partials.form')
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
@endsection
