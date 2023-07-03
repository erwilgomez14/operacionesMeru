<?php

namespace App\Http\Controllers;

use App\Models\Acueductos;
use App\Models\Gerencia;
use App\Models\Localidad;
use App\Models\Modeloplanta;
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
        $modelosplanta = Modeloplanta::all();

        return view('activos.acueductos.create', compact('gerencias', 'localidades', 'modelosplanta'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ultimo_acueducto = Acueductos::orderBy('id_acueducto', 'desc')->first();
        
        
        //dd($request);
        $request->validate([
            'nombre_acueducto' => 'max:80|string',
            'descripcion_acueducto' => 'max:150|string',
            'fuente_abastecimiento' => 'max:80|string',
            'capacidad_produccion' => 'numeric',
            'tiempo_operacion' => 'numeric',
            'energia_util' => 'max:20|string',
            'modelo_planta' => 'required',
            'gerencia' => 'required',
            'localidad' => 'required',
        ]);



        $acueducto = new Acueductos;
        if(!$ultimo_acueducto){
            $nuevo_valor = 'A01';
        } else {
            $valor = intval(substr($ultimo_acueducto->id_acueducto, 1));
            $valor += 1;
            $nuevo_valor = 'A' . str_pad($valor, 2, '0', STR_PAD_LEFT);
        }
        


        $acueducto->id_acueducto = $nuevo_valor;
        $acueducto->nom_acu = $request->nombre_acueducto;
        $acueducto->desc_acu = $request->descripcion_acueducto;
        $acueducto->fuente_abast = $request->fuente_abastecimiento;
        $acueducto->capacidad_almac = $request->capacidad_produccion;
        $acueducto->tiempo_oper = $request->tiempo_operacion;
        $acueducto->energia_util = $request->energia_util;
        $acueducto->modelo_planta = $request->modelo_planta;
        $acueducto->id_gerencia = $request->gerencia;
        $acueducto->cod_ubi = $request->localidad;
        

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
        //dd($acueducto->gerencias);


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
            'nom_acu' => 'max:80|string',
            'desc_acu' => 'max:150|string',
            'fuente_abast' => 'max:80|string',
            'capacidad_almac' => 'numeric',
            'tiempo_oper' => 'numeric',
            'energia_util' => 'max:20|string',
            'modelo_planta' => 'max:20|string',
        ]);

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
