<?php

namespace App\Http\Controllers;

use App\Models\Acueductos;
use Illuminate\Http\Request;

class AcueductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $acueductos = Acueductos::get();
        return view('activos.acueductos.page', compact('acueductos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('activos.acueductos.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $acueducto = new Acueductos;

        $acueducto->id_acueducto = $request->id_acueducto;
        $acueducto->nom_acu = $request->nom_acu;
        $acueducto->desc_acu = $request->desc_acu;
        $acueducto->fuente_abast = $request->fuente_abast;
        $acueducto->capacidad_almac = $request->capacidad_almac;
        $acueducto->tiempo_oper = $request->tiempo_oper;
        $acueducto->energia_util = $request->energia_util;
        $acueducto->modelo_planta = $request->modelo_planta;

        $acueducto->save();

        return redirect()->route('acueductos.index')->with('status', 'Acueducto Creado Satisfactoriamente');

    }

    /**
     * Display the specified resource.
     */
    public function show(Acueductos $acueductos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Acueductos $acueductos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Acueductos $acueductos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Acueductos $acueductos)
    {
        //
    }
}
