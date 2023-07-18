<?php

namespace App\Http\Controllers;

use App\Models\Acueductos;
use App\Models\Gerencia;
use App\Models\Localidad;
use App\Models\Modeloplanta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

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
        $acueducto = null;
        $gerencias = Gerencia::all();
        $localidades = Localidad::all();
        $modelosplanta = Modeloplanta::all();

        return view('activos.acueductos.create', compact('acueducto', 'gerencias', 'localidades', 'modelosplanta'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ultimo_acueducto = Acueductos::orderBy('id_acueducto', 'desc')->first();


        //dd($ultimo_acueducto);
        $request->validate([
            'nombre_acueducto' => 'required|max:80|string|unique:ope_acueducto,nom_acu',
            'descripcion' => 'required|max:150|string',
            'fuente_abastecimiento' => 'required|max:80|string',
            'capacidad_produccion' => 'required|numeric',
            'tiempo_operacion' => 'required|numeric',
            'energia_util' => 'required|max:20|string',
            'modelo_planta' => 'required',
            'gerencia' => 'required',
            'ubicacion' => 'required',
        ]);



        $acueducto = new Acueductos;
        if (!$ultimo_acueducto) {
            $nuevo_valor = 'A01';
        } else {
            $valor = intval(substr($ultimo_acueducto->id_acueducto, 1));
            $valor += 1;
            $nuevo_valor = 'A' . str_pad($valor, 2, '0', STR_PAD_LEFT);
        }



        $acueducto->id_acueducto = $nuevo_valor;
        $acueducto->nom_acu = strtoupper($request->nombre_acueducto);
        $acueducto->desc_acu = strtoupper($request->descripcion);
        $acueducto->fuente_abast = strtoupper($request->fuente_abastecimiento);
        $acueducto->capacidad_almac = $request->capacidad_produccion;
        $acueducto->tiempo_oper = $request->tiempo_operacion;
        $acueducto->energia_util = strtoupper($request->energia_util);

        $acueducto->modelo_planta = $request->modelo_planta;
        $acueducto->id_gerencia = $request->gerencia;
        $acueducto->cod_ubi = $request->ubicacion;

        //dd($acueducto);
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

        $modelosplanta = Modeloplanta::all();

        $gerencias = Gerencia::all();
        $localidades = Localidad::all();
        return view('activos.acueductos.edit', compact('acueducto', 'gerencias', 'localidades', 'modelosplanta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Acueductos $acueducto)
    {
        $request->validate([
            // 'nombre_acueducto' => 'max:80|string|unique:ope_acueducto,nom_acu',
            'nombre_acueducto' => [
                'max:80',
                'string',
                Rule::unique('ope_acueducto', 'nom_acu')->ignore($acueducto->id_acueducto, 'id_acueducto'),
            ],
            'descripcion' => 'required|max:150|string',
            'fuente_abastecimiento' => 'required|max:80|string',
            'capacidad_produccion' => 'required|numeric',
            'tiempo_operacion' => 'required|numeric',
            'energia_util' => 'required|max:20|string',
            'modelo_planta' => 'required',
            'gerencia' => 'required',
            'ubicacion' => 'required',
        ]);

        $acueducto->nom_acu = strtoupper($request->nombre_acueducto);
        $acueducto->desc_acu = strtoupper($request->descripcion);
        $acueducto->fuente_abast = strtoupper($request->fuente_abastecimiento);
        $acueducto->capacidad_almac = $request->capacidad_produccion;
        $acueducto->tiempo_oper = $request->tiempo_operacion;
        $acueducto->energia_util = strtoupper($request->energia_util);

        $acueducto->modelo_planta = $request->modelo_planta;
        $acueducto->id_gerencia = $request->gerencia;
        $acueducto->cod_ubi = $request->ubicacion;

        //dd($acueducto);
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
