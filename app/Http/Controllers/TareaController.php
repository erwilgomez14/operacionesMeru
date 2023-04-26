<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\GrupoHerramienta;
use App\Models\Subsistema;
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
        $tipoequipo = Subsistema::get();
        $grupo_herramienta = GrupoHerramienta::get();
        //dd($grupo_herramienta);
        return view('mantenimiento.grupotarea.create', compact('tipoequipo',
        'grupo_herramienta'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datostarea = $request->input('odt');

        $tipo_eq =
        dd();
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

    public function hasEquipo(Request $request){

        if (isset($request->texto)){
            $equipos = Equipo::where('id_subsistema',$request->texto)->get();
            return response()->json([
                'lista' => $equipos,
                'success' => true
            ]);
        }else {
            return response()->json([
                'success' => false
            ]);
        }
    }
}
