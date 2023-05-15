<?php

namespace App\Http\Controllers;

use App\Models\Herramienta;
use App\Models\GrupoHerramienta;
use Illuminate\Http\Request;

class HerramientaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $herramientas = Herramienta::all();
        return view('activos.herramientas.page', compact('herramientas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $grupos = GrupoHerramienta::all();   
        return view('activos.herramientas.create', compact('grupos'));
    }
    public function creategroup()
    {
        $grupos = GrupoHerramienta::all();
        // dd($grupos);
        return view('activos.herramientas.creategroup', compact('grupos'));
    }
   
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'nombre_herramienta' => 'required',
            'id_grupo_herramienta' => 'required'
           
        ]);
        

        $herramienta = new Herramienta;
        $herramienta->nombre_herramienta = $request->nombre_herramienta;
        $herramienta->id_grupo_herramienta = $request->id_grupo_herramienta;
        $herramienta->save();

        return redirect()->route('herramientas.index')->with('status', 'Herramienta creada satisfactoriamente');

        
    
    }
    public function storegroup(Request $request)
    {
        $request->validate([
            'nombre_grupo' => 'required|unique:ope_grupo_herramienta',
           
        ]);

        $grupo = new GrupoHerramienta();
        $grupo->nombre_grupo = $request->nombre_grupo;

        $grupo->save();
        return redirect()->route('herramientas.creategroup')->with('status', 'Grupo de tareas creao satisfactoriamente');
    }
    /**
     * Display the specified resource.
     */
    public function show(Herramienta $herramienta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Herramienta $herramienta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Herramienta $herramienta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Herramienta $herramienta)
    {
        //
    }
}
