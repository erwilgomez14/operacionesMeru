<?php

namespace App\Http\Controllers;

use App\Models\OrdenTrabajo;
use Illuminate\Http\Request;

class MantenimientoPreventivoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ordenes_trabajo = OrdenTrabajo::all();

        $eventos = [];

        foreach ($ordenes_trabajo as $orden) {
            $evento = [
                'title' => $orden->descrip_ot,
                'start' => $orden->fecha_inicio,
                'duration' => $orden->dias,
                'end' => $orden->fecha_final,
                'url' => route('ordentrabajo.show', $orden->id_orden),
               // 'display' => 'background'
            ];

            $eventos[] = $evento;
        }

        return view('panel.mantenimientopreventivo.page', compact('eventos'));
    }

    public function hasOrden()
    {
        $ordenes_trabajo = OrdenTrabajo::all();

        $eventos = [];

        foreach ($ordenes_trabajo as $orden) {
            $evento = [
                'title' => $orden->descrip_ot,
                'start' => $orden->fecha_inicio,
                'end' => $orden->fecha_final,
                'url' => route('ordentrabajo.show', $orden->id_orden),
            ];

            $eventos[] = $evento;
        }
        return response()->json($eventos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        return view('panel.mantenimientopreventivo.show',);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
