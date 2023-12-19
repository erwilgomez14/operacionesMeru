<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\GrupoHerramienta;
use App\Models\Subsistema;
use App\Models\Tarea;
use App\Models\TareaGrupoHerramienta;
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
        $tipoequipo = TipoEquipo::get();
        $grupo_herramienta = GrupoHerramienta::get();
        // dd($tipoequipo);
        return view('mantenimiento.grupotarea.create', compact('tipoequipo',
        'grupo_herramienta'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request);
        $datostarea = $request->input('odt');

        $tra = new Tarea;
        $tra->tarea = $datostarea['tarea'];


        // $equipo = Equipo::where('id_equipo',$datostarea['id_equipo'] )->first();

        // $tra->id_tipo_eq = $equipo->id_tipo_eq;
        $tra->id_tipo_eq = $datostarea['id_sistema'];


        $tra->save();
        //dd($tra);
        $tareagrupoherr = $request->input('data');

        foreach ($tareagrupoherr as $dato) {
            //dd($dato);
            $tgh = TareaGrupoHerramienta::create([
            'id_tarea' => $tra->id_tareas,
            'id_grupo_herramienta' => $dato['id'],
            ]);
        }


        return response()->json(['success' => true, 'tra' => $tra], 200);

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
