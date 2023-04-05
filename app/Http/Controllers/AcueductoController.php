<?php

namespace App\Http\Controllers;

use App\Models\Acueductos;
use App\Models\Gerencia;
use App\Models\Localidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;


class AcueductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $acueductos = Acueductos::orderBy('id_acueducto', 'desc')->get();
        return view('activos.acueductos.page', compact('acueductos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $gerencias = Gerencia::all();
        $localidades = Localidad::all();


        return view('activos.acueductos.create', compact('gerencias', 'localidades'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_acueducto' => 'required|unique:ope_acueducto|max:4',
            'nom_acu' => 'max:80|string',
            'desc_acu' => 'max:150|string',
            'fuente_abast' => 'max:80|string',
            'capacidad_almac' => 'numeric',
            'tiempo_oper' => 'numeric',
            'energia_util' => 'max:20|string',
            'modelo_planta' => 'max:20|string',

        ]);

        $acueducto = new Acueductos;

        $acueducto->id_acueducto = $request->id_acueducto;
        $acueducto->nom_acu = $request->nom_acu;
        $acueducto->desc_acu = $request->desc_acu;
        $acueducto->fuente_abast = $request->fuente_abast;
        $acueducto->capacidad_almac = $request->capacidad_almac;
        $acueducto->tiempo_oper = $request->tiempo_oper;
        $acueducto->energia_util = $request->energia_util;
        $acueducto->modelo_planta = $request->modelo_planta;
        if($request->id_gerencia == 'Selecionar Gerencia'){
            $acueducto->id_gerencia = null;
        }else {
            $acueducto->id_gerencia = $request->id_gerencia;
        }
        if($request->cod_ubi == 'Selecionar Localidad'){
            $acueducto->cod_ubi = null;
        }else {
            $acueducto->cod_ubi = $request->cod_ubi;
        }

        $acueducto->save();

        return redirect()->route('acueductos.index')->with('status', 'Acueducto Creado Satisfactoriamente');

    }

    /**
     * Display the specified resource.
     */
    public function show(Acueductos $acueducto)
    {
        //dd($acueducto->gerencias());
        return view('activos.acueductos.show', compact('acueducto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Acueductos $acueducto)
    {
        //if (! Gate::allows('esSU', $acueducto)) {
          //  abort(403);
        //}



        $gerencias = Gerencia::all();
        $localidades = Localidad::all();
        return view('activos.acueductos.edit', compact('acueducto', 'gerencias','localidades'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Acueductos $acueducto)
    {
        $request->validate([
            'id_acueducto' => 'required|unique:ope_acueducto|max:4',
            'nom_acu' => 'max:80|string',
            'desc_acu' => 'max:150|string',
            'fuente_abast' => 'max:80|string',
            'capacidad_almac' => 'numeric',
            'tiempo_oper' => 'numeric',
            'energia_util' => 'max:20|string',
            'modelo_planta' => 'max:20|string',
        ]);

        $acueducto->id_acueducto = $request->id_acueducto;
        $acueducto->nom_acu = $request->nom_acu;
        $acueducto->desc_acu = $request->desc_acu;
        $acueducto->fuente_abast = $request->fuente_abast;
        $acueducto->capacidad_almac = $request->capacidad_almac;
        $acueducto->tiempo_oper = $request->tiempo_oper;
        $acueducto->energia_util = $request->energia_util;
        $acueducto->modelo_planta = $request->modelo_planta;

        if($request->id_gerencia != null){
            $acueducto->id_gerencia = $request->id_gerencia;
        };
        if($request->cod_ubi != null){
            $acueducto->cod_ubi = $request->cod_ubi;
        };


        $acueducto->save();

        return redirect()->route('acueductos.index')->with('status', 'Acueducto Editado Satisfactoriamente');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Acueductos $acueducto)
    {
        $acueducto->delete();

        return redirect()->route('acueductos.index')->with('status', 'Registro eliminado satisfactoriamente');
    }
}
