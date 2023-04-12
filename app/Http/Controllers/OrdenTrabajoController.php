<?php

namespace App\Http\Controllers;

use App\Models\Acueductos;
use App\Models\OrdenTrabajo;
use App\Models\Sistema;
use App\Models\Tarea;
use App\Models\TipoOrdenTrabajo;
use App\Models\PrioridadOrdenTrabajo;
use App\Models\Equipo;
use App\Models\User;
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
        $usuarios = User::all();
        $acueductos = Acueductos::all();
        $tiposorden = TipoOrdenTrabajo::all();
        $ordenprioridad = PrioridadOrdenTrabajo::all();
        //dd($ordenprioridad);

        return view('mantenimiento.ordentrabajo.create',
        compact('usuarios',
            'acueductos',
            'tiposorden',
            'ordenprioridad'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request);
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



    public function hasSistema(Request $request){
        if (isset($request->texto)){
            $sistemas = Sistema::where('id_acueducto',$request->texto)->get();
           // dd($sistemas);
            return response()->json([
                'lista' => $sistemas,
                'success' => true
            ]);
        }else {
            return response()->json([
                'success' => false
            ]);
        }
    }
    public function hasEquipo(Request $request){

        if (isset($request->texto)){
            $equipos = Equipo::where('id_sistema',$request->texto)->get();
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
    public function hasTareas(Request $request){

        if (isset($request->tipoEquipo)){
            $tareas = Tarea::where('id_tipo_eq',$request->tipoEquipo)->get();
            return response()->json([
                'tarea' => $tareas,
                'success' => true
            ]);
        }else {
            return response()->json([
                'success' => false
            ]);
        }
    }

}
