<?php

namespace App\Http\Controllers;

use App\Models\Suministro;
use App\Models\Tarea;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class SuministroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suministros = Suministro::all();
        return view('suministros.suministros.page', compact('suministros'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tareas = Tarea::all();
        return view('suministros.suministros.create', compact('tareas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request);

        $request->validate([
            'nombre' => 'required|unique:ope_suministros,nombre_suministro',
            'descripcion' => 'required',
        ]);

        $suministro = new Suministro;

        $suministro->nombre_suministro = strtoupper($request->nombre);
        $suministro->detalle_suministro = strtoupper($request->descripcion);

        $suministro->save();

        return redirect()->route('suministros.index')->with('status', 'Sumnistro Creado Satisfactoriamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Suministro $suministro)
    {
        return view('suministros.suministros.show', compact('suministro'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Suministro $suministro)
    {
        return view('suministros.suministros.edit', compact('suministro'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Suministro $suministro)
    {
        //dd($request);

        $request->validate([
            'nombre' => [
                'required',
                Rule::unique('ope_suministros', 'nombre_suministro')->ignore($suministro->id, 'id'),
            ],
            'descripcion' => 'required',
        ]);

        $suministro->nombre_suministro = strtoupper($request->nombre);
        $suministro->detalle_suministro = strtoupper($request->descripcion);

        $suministro->save();

        return redirect()->route('suministros.index')->with('status', 'Sumnistro Creado Satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Suministro $suministro)
    {
        //
    }
}
