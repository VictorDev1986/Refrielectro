@extends('layouts.main')

@section('titulo', $titulo)

@section('contenido')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Gastos</h1>
  </div>

  <section class="section">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-body">
            <h5 class="card-title">Filtros</h5>
            <form method="GET" action="{{ route('gastos.index') }}">
              <div class="row g-3 align-items-end">
                <div class="col-md-3">
                  <label class="form-label">Categoría</label>
                  <select class="form-select" name="categoria">
                    <option value="">Todas</option>
                    @foreach ($categorias as $key => $label)
                      <option value="{{ $key }}" {{ ($filtros['categoria'] ?? '') === $key ? 'selected' : '' }}>
                        {{ $label }}
                      </option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-2">
                  <label class="form-label">Desde</label>
                  <input type="date" name="fecha_desde" class="form-control" value="{{ $filtros['fecha_desde'] ?? '' }}">
                </div>
                <div class="col-md-2">
                  <label class="form-label">Hasta</label>
                  <input type="date" name="fecha_hasta" class="form-control" value="{{ $filtros['fecha_hasta'] ?? '' }}">
                </div>
                <div class="col-md-3">
                  <label class="form-label">Venta asociada</label>
                  <select class="form-select" name="venta_id">
                    <option value="">Todas</option>
                    @foreach ($ventas as $venta)
                      <option value="{{ $venta->id }}" {{ ($filtros['venta_id'] ?? '') == $venta->id ? 'selected' : '' }}>
                        Venta #{{ $venta->id }} - ${{ number_format($venta->total_venta, 2) }}
                      </option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-2 d-flex gap-2">
                  <button type="submit" class="btn btn-primary flex-fill">Filtrar</button>
                  <a href="{{ route('gastos.index') }}" class="btn btn-outline-secondary" title="Limpiar filtros">
                    Limpiar
                  </a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-start flex-wrap gap-2">
              <div>
                <h5 class="card-title mb-1">Listado de gastos</h5>
                <small class="text-muted">Total filtrado: ${{ number_format($totalFiltrado, 2) }}</small>
              </div>
              <a href="{{ route('gastos.create') }}" class="btn btn-success">
                <i class="fa-solid fa-circle-plus"></i> Registrar gasto
              </a>
            </div>

            <div class="table-responsive">
              <table class="table table-striped align-middle">
                <thead>
                  <tr>
                    <th>Fecha</th>
                    <th>Categoría</th>
                    <th>Descripción</th>
                    <th class="text-end">Monto</th>
                    <th>Venta asociada</th>
                    <th class="text-center">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($gastos as $gasto)
                    <tr>
                      <td>{{ $gasto->fecha->format('d/m/Y') }}</td>
                      <td>{{ $categorias[$gasto->categoria] ?? ucfirst(str_replace('_', ' ', $gasto->categoria)) }}</td>
                      <td class="text-wrap" style="max-width: 280px;">{{ $gasto->descripcion }}</td>
                      <td class="text-end fw-semibold">${{ number_format($gasto->monto, 2) }}</td>
                      <td>
                        @if ($gasto->venta)
                          <span class="badge bg-primary-subtle text-primary">Venta #{{ $gasto->venta->id }}</span>
                          <div class="small text-muted">Total: ${{ number_format($gasto->venta->total_venta, 2) }}</div>
                        @else
                          <span class="badge bg-light text-dark">Sin relación</span>
                        @endif
                      </td>
                      <td class="text-center">
                        <div class="btn-group" role="group">
                          <a href="{{ route('gastos.edit', $gasto) }}" class="btn btn-sm btn-warning">
                            <i class="fa-solid fa-pen-to-square"></i>
                          </a>
                          <form action="{{ route('gastos.destroy', $gasto) }}" method="POST" onsubmit="return confirm('¿Desea eliminar este gasto?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">
                              <i class="fa-solid fa-trash-can"></i>
                            </button>
                          </form>
                        </div>
                      </td>
                    </tr>
                  @empty
                    <tr>
                      <td colspan="6" class="text-center text-muted py-4">
                        No se encontraron gastos con los filtros aplicados.
                      </td>
                    </tr>
                  @endforelse
                </tbody>
              </table>
            </div>

            <div class="mt-3">
              {{ $gastos->links() }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
@endsection
