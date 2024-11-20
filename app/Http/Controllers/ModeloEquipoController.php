<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use App\Models\Modelo;
use Illuminate\Http\Request;

class ModeloEquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $modelos = Modelo::all();

        return view('ajustes.modelo.page', compact('modelos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $marcas = Marca::all();
        return view('ajustes.modelo.create', compact('marcas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'id_marca' => 'required',
            'descripcion' => 'required',
        ]);

        $modelo = new Modelo;
        $modelo->nombre_modelo = strtoupper($request->nombre);
        $modelo->id_marca = $request->id_marca;
        $modelo->descripcion_modelo = strtoupper($request->descripcion);

        $modelo->save();

        return redirect()->route('modelo.index')->with('status', 'Modelo Creada Satisfactoriamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Modelo $modelo)
    {
        return view('ajustes.modelo.show', compact('modelo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Modelo $modelo)
    {
        $marcas = Marca::all();

        return view('ajustes.modelo.edit', compact('modelo', 'marcas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Modelo $modelo)
    {
        $request->validate([
            'nombre' => 'required',
            'id_marca' => 'required',
            'descripcion' => 'required',
        ]);

        $modelo->nombre_modelo = strtoupper($request->nombre);
        $modelo->id_marca = $request->id_marca;
        $modelo->descripcion_modelo = strtoupper($request->descripcion);

        $modelo->save();

        return redirect()->route('modelo.index')->with('status', 'Modelo: '.$modelo->id_modelo.' Editada Satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
