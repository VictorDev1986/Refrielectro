<div class="row g-3">
  <div class="col-md-6">
    <label class="form-label">Categoría <span class="text-danger">*</span></label>
    <select name="categoria" class="form-select" required>
      <option value="" disabled {{ old('categoria', $gasto->categoria ?? '') === '' ? 'selected' : '' }}>Seleccione...</option>
      @foreach ($categorias as $key => $label)
        <option value="{{ $key }}" {{ old('categoria', $gasto->categoria) === $key ? 'selected' : '' }}>
          {{ $label }}
        </option>
      @endforeach
    </select>
    @error('categoria')
      <div class="text-danger small">{{ $message }}</div>
    @enderror
  </div>

  <div class="col-md-3">
    <label class="form-label">Monto <span class="text-danger">*</span></label>
    <div class="input-group">
      <span class="input-group-text">$</span>
      <input type="number" name="monto" step="0.01" min="0" class="form-control" value="{{ old('monto', $gasto->monto) }}" required>
    </div>
    @error('monto')
      <div class="text-danger small">{{ $message }}</div>
    @enderror
  </div>

  <div class="col-md-3">
    <label class="form-label">Fecha <span class="text-danger">*</span></label>
    <input type="date" name="fecha" class="form-control" value="{{ old('fecha', optional($gasto->fecha)->format('Y-m-d')) }}" required>
    @error('fecha')
      <div class="text-danger small">{{ $message }}</div>
    @enderror
  </div>

  <div class="col-12">
    <label class="form-label">Descripción <span class="text-danger">*</span></label>
    <textarea name="descripcion" class="form-control" rows="3" required>{{ old('descripcion', $gasto->descripcion) }}</textarea>
    @error('descripcion')
      <div class="text-danger small">{{ $message }}</div>
    @enderror
  </div>

  <div class="col-md-6">
    <label class="form-label">Venta relacionada (opcional)</label>
    <select name="venta_id" class="form-select">
      <option value="">Sin relación</option>
      @foreach ($ventas as $venta)
        <option value="{{ $venta->id }}" {{ old('venta_id', $gasto->venta_id) == $venta->id ? 'selected' : '' }}>
          Venta #{{ $venta->id }} - ${{ number_format($venta->total_venta, 2) }}
        </option>
      @endforeach
    </select>
    <small class="text-muted">Solo se muestran las últimas 50 ventas.</small>
    @error('venta_id')
      <div class="text-danger small">{{ $message }}</div>
    @enderror
  </div>
</div>

<div class="d-flex justify-content-end gap-2 mt-4">
  <a href="{{ route('gastos.index') }}" class="btn btn-outline-secondary">Cancelar</a>
  <button type="submit" class="btn btn-primary">Guardar</button>
</div>
