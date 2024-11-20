<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;

class MarcaEquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $marcas = Marca::all();
        return view('ajustes.marca.page', compact('marcas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ajustes.marca.create');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        

        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
        ]);

        $marca = new Marca;
        $marca->nombre_marca = strtoupper($request->nombre);
        $marca->descripcion_marca = strtoupper($request->descripcion);

        $marca->save();
//        dd($marca);
        return redirect()->route('marca.index')->with('status', 'Marca Creada Satisfactoriamente');

    }

    /**
     * Display the specified resource.
     */
    public function show(Marca $marca)
    {
        return view('ajustes.marca.show', compact('marca'));
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Marca $marca)
    {
        return view('ajustes.marca.edit', compact('marca'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Marca $marca)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
        ]);

        $marca->nombre_marca = strtoupper($request->nombre);
        $marca->descripcion_marca = strtoupper($request->descripcion);

        $marca->save();
//        dd($marca);
        return redirect()->route('marca.index')->with('status', 'Marca: '.$marca->id_marca.' Editada Satisfactoriamente');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
