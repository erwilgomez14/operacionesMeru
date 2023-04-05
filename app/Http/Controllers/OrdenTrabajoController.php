<?php

namespace App\Http\Controllers;

use App\Models\Acueductos;
use App\Models\OrdenTrabajo;
use App\Models\Sistema;
use Illuminate\Http\Request;
use function Sodium\compare;

class OrdenTrabajoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('mantenimiento.ordentrabajo.page');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $acueductos = Acueductos::all();

        return view('mantenimiento.ordentrabajo.create',
        compact('acueductos'));

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
    public function show(OrdenTrabajo $ordenTrabajo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OrdenTrabajo $ordenTrabajo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OrdenTrabajo $ordenTrabajo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrdenTrabajo $ordenTrabajo)
    {
        //
    }

    public function obtenersistemas(Acueductos $acueducto)
    {
        //dd($acueducto->sistemas);
        return response()->json($acueducto->sistemas);
    }
}
