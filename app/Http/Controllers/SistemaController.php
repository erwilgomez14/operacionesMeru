<?php

namespace App\Http\Controllers;

use App\Models\Acueductos;
use App\Models\Area;
use App\Models\Sistema;
use Illuminate\Http\Request;

class SistemaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sistemas = Sistema::get();

        return view('activos.sistemas.page', compact('sistemas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $acueductos = Acueductos::all();
        $areas = Area::all();

        return view('activos.sistemas.create', compact('acueductos','areas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $sistema = new Sistema;
        $sistema->id_sistema = $request->id_sistema;
        if($request->id_acueducto == 'Selecionar Acueducto'){
            $sistema->id_acueducto = null;
        }else {
            $sistema->id_acueducto = $request->id_acueducto;
        }
        $sistema->nom_sistema = $request->nom_sistema;
        $sistema->desc_sistema = $request->desc_sistema;
        $sistema->posiciones = $request->posiciones;
        $sistema->posicion_necesaria = $request->posicion_necesaria;
        if($request->id_area == 'Selecionar area'){
            $sistema->id_area = null;
        }else {
            $sistema->id_area = $request->id_area;
        }
        dd($sistema->id_area);


    }
        /**
     * Display the specified resource.
     */
    public function show(Sistema $sistema)
    {
        return view('activos.sistemas.show', compact('sistema'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sistema $sistema)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sistema $sistema)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sistema $sistema)
    {
        //
    }
}
