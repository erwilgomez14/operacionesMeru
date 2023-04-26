<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use App\Models\TipoEquipo;
use Illuminate\Http\Request;

class TareaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('mantenimiento.grupotarea.page');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tipoequipo = TipoEquipo::all();
        return view('mantenimiento.grupotarea.create', compact('tipoequipo'));
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
    public function show(Tarea $tarea)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tarea $tarea)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tarea $tarea)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tarea $tarea)
    {
        //
    }
}