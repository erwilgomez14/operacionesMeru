<?php

namespace App\Http\Controllers;

use App\Models\Acueductos;
use App\Models\Area;
use App\Models\MaestroSistema;
use App\Models\Sistema;
use App\Models\UbicacionPlanta;
use Illuminate\Http\Request;

class SistemaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sistemas = Sistema::all();

        return view('activos.sistemas.page', compact('sistemas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $acueductos = Acueductos::all();
        $areas = Area::all();
        $ubiplantas = UbicacionPlanta::all();
        $maestrosistemas = MaestroSistema::all();

        return view('activos.sistemas.create',
            compact('acueductos',
                'areas',
                'ubiplantas',
                'maestrosistemas'));
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
        if($request->id_ubicpl == 'Selecionar ubicacion'){
            $sistema->id_ubicpl = null;
        }else {
            $sistema->id_ubicpl = $request->id_ubicpl;
        }
        if($request->id_pardeftsi == 'Selecionar tipo de sistema'){
            $sistema->id_pardeftsi = null;
        }else {
            $sistema->id_pardeftsi = $request->id_pardeftsi;
        }
        $sistema->capacidad_sistema = $request->capacidad_sistema;
        $sistema->georeferencia = $request->georeferencia;

        $sistema->save();

        return view('activos.sistemas.page')->with('status', 'Sistema creado satisfactoriamente');


    }
        /**
     * Display the specified resource.
     */
    public function show(Sistema $sistema)
    {
        //dd($sistema->ubicacionesPlantas);
        return view('activos.sistemas.show', compact('sistema',));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sistema $sistema)
    {
        $acueductos = Acueductos::all();
        $areas = Area::all();
        $ubiplantas = UbicacionPlanta::all();
        $maestrosistemas = MaestroSistema::all();
        //dd($maestrosistemas->first());
        return view('activos.sistemas.edit', compact('sistema',
            'acueductos',
                'areas',
                'ubiplantas',
                'maestrosistemas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sistema $sistema)
    {
        $sistema->id_sistema = $request->id_sistema;
        if($request->id_acueducto != null){
            $sistema->id_acueducto = $request->id_acueducto;
        };
        $sistema->nom_sistema = $request->nom_sistema;
        $sistema->desc_sistema = $request->desc_sistema;
        $sistema->posiciones = $request->posiciones;
        $sistema->posicion_necesaria = $request->posicion_necesaria;
        if($request->id_area != null){
            $sistema->id_area = $request->id_area;
        };
        if($request->id_ubicpl != null){
            $sistema->id_ubicpl = $request->id_ubicpl;
        };
        if($request->id_pardeftsi != null){
            $sistema->id_pardeftsi = $request->id_pardeftsi;
        };
        $sistema->capacidad_sistema = $request->capacidad_sistema;
        $sistema->georeferencia = $request->georeferencia;
        $sistema->save();

        return redirect()->route('sistemas.index')->with('status', 'Sistema editado satisfactoriamente');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sistema $sistema)
    {
        //
    }
    public function obtenersistema(Sistema $sistema,Acueductos $acueducto)
    {
        dd($sistema->acueductos());
    }
}
