<?php

namespace App\Http\Controllers;

use App\Models\Sistema;
use App\Models\Subsistema;
use Illuminate\Http\Request;
use function Sodium\compare;

class SubsistemaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subsistemas = Subsistema::all();
        return view('activos.subsistema.page',
        compact('subsistemas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sistemas = Sistema::all();
        return view('activos.subsistema.create', compact('sistemas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_subsistema' => 'required|unique:ope_subsistema',
            'id_sistema' => 'required',
            'nombre_subsistema' => 'required',
            'desc_subsistema' => 'required',
            'capacidad_subsistema' => 'required|numeric',
        ]);

        $id_subsistema = $request->id_subsistema;
        $partes = explode("-",$id_subsistema);
        $postec = end($partes);

        $subsistema = new Subsistema;
        $subsistema->id_subsistema = $id_subsistema;
        $subsistema->id_sistema = $request->id_sistema;
        $subsistema->nombre_subsistema = $request->nombre_subsistema;
        $subsistema->desc_subsistema = $request->desc_subsistema;
        $subsistema->posicion_tecnica = substr($postec, 0, 3);
        $subsistema->capacidad_subsistema = $request->capacidad_subsistema;
        $subsistema->observacion = $request->observacion;

        $subsistema->save();

        return redirect()->route('subsistemas.index')->with('status', 'Subsistema: '.$subsistema->nombre_subsistema.' creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Subsistema $subsistema)
    {
        //dd($subsistema->sistemas);

        return view('activos.subsistema.show', compact('subsistema'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subsistema $subsistema)
    {

        $sistemas = Sistema::all();

        return view('activos.subsistema.edit', compact('subsistema',
        'sistemas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subsistema $subsistema)
    {
        $request->validate([
            'id_sistema' => 'required',
            'nombre_subsistema' => 'required',
            'desc_subsistema' => 'required',
            'capacidad_subsistema' => 'required|numeric',
        ]);

        $id_subsistema = $request->id_subsistema;
        $partes = explode("-",$id_subsistema);
        $postec = end($partes);

        $subsistema->id_subsistema = $id_subsistema;
        $subsistema->id_sistema = $request->id_sistema;
        $subsistema->nombre_subsistema = $request->nombre_subsistema;
        $subsistema->desc_subsistema = $request->desc_subsistema;
        $subsistema->posicion_tecnica = substr($postec, 0, 3);
        $subsistema->capacidad_subsistema = $request->capacidad_subsistema;
        $subsistema->observacion = $request->observacion;

        $subsistema->save();

        return redirect()->route('subsistemas.index')->with('status', 'Subsistema: '.$subsistema->nombre_subsistema.' actualizado correctamente');
        dd($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subsistema $subsistema)
    {
        //
    }
}
