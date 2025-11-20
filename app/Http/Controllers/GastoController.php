<?php

namespace App\Http\Controllers;

use App\Models\Gasto;
use App\Models\Venta;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GastoController extends Controller
{
    public function index(Request $request): View
    {
        $titulo = 'Módulo de Gastos';

        $query = Gasto::with('venta')->orderByDesc('fecha');

        if ($request->filled('categoria')) {
            $query->where('categoria', $request->string('categoria'));
        }

        if ($request->filled('venta_id')) {
            $query->where('venta_id', $request->integer('venta_id'));
        }

        if ($request->filled('fecha_desde')) {
            $query->whereDate('fecha', '>=', $request->date('fecha_desde'));
        }

        if ($request->filled('fecha_hasta')) {
            $query->whereDate('fecha', '<=', $request->date('fecha_hasta'));
        }

        $totalFiltrado = (clone $query)->sum('monto');
        $gastos = $query->paginate(10)->withQueryString();

        $categorias = Gasto::CATEGORIAS;
        $ventas = Venta::orderByDesc('created_at')->select('id', 'total_venta', 'created_at')->take(50)->get();
        $filtros = $request->only(['categoria', 'fecha_desde', 'fecha_hasta', 'venta_id']);

        return view('modules.gastos.index', compact(
            'titulo',
            'gastos',
            'categorias',
            'ventas',
            'filtros',
            'totalFiltrado'
        ));
    }

    public function create(): View
    {
        $titulo = 'Registrar gasto';
        $gasto = new Gasto();
        $categorias = Gasto::CATEGORIAS;
        $ventas = Venta::orderByDesc('created_at')->select('id', 'total_venta', 'created_at')->take(50)->get();

        return view('modules.gastos.create', compact('titulo', 'gasto', 'categorias', 'ventas'));
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validatedData($request);
        Gasto::create($data);

        return redirect()->route('gastos.index')->with('success', 'Gasto registrado correctamente.');
    }

    public function edit(Gasto $gasto): View
    {
        $titulo = 'Editar gasto';
        $categorias = Gasto::CATEGORIAS;
        $ventas = Venta::orderByDesc('created_at')->select('id', 'total_venta', 'created_at')->take(50)->get();

        return view('modules.gastos.edit', compact('titulo', 'gasto', 'categorias', 'ventas'));
    }

    public function update(Request $request, Gasto $gasto): RedirectResponse
    {
        $data = $this->validatedData($request);
        $gasto->update($data);

        return redirect()->route('gastos.index')->with('success', 'Gasto actualizado correctamente.');
    }

    public function destroy(Gasto $gasto): RedirectResponse
    {
        $gasto->delete();

        return redirect()->route('gastos.index')->with('success', 'Gasto eliminado correctamente.');
    }

    protected function validatedData(Request $request): array
    {
        return $request->validate([
            'categoria' => 'required|in:' . implode(',', array_keys(Gasto::CATEGORIAS)),
            'descripcion' => 'required|string|max:255',
            'monto' => 'required|numeric|min:0',
            'fecha' => 'required|date',
            'venta_id' => 'nullable|exists:ventas,id',
        ]);
    }
}
