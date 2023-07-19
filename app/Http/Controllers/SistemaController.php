<?php

namespace App\Http\Controllers;

use App\Models\Acueductos;
use App\Models\Area;
use App\Models\MaestroSistema;
use App\Models\Sistema;
use App\Models\UbicacionPlanta;
use Illuminate\Http\Request;

class SistemaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sistemas = Sistema::all();

        return view('activos.sistemas.page', compact('sistemas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sistema = null;
        $acueductos = Acueductos::all();
        $areas = Area::all();
        $ubiplantas = UbicacionPlanta::all();
        $maestrosistemas = MaestroSistema::all();

        return view(
            'activos.sistemas.create',
            compact(
                'acueductos',
                'areas',
                'ubiplantas',
                'maestrosistemas',
                'sistema',
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //dd($request);
        $request->validate([
            'id_sistema' => 'required|unique:ope_sistema,id_sistema',
            'id_acueducto' => 'required',
            'nom_sistema' => 'required',
            'descripcion' => 'required|max:150',
            'posiciones' => 'required|numeric',
            // 'posiciones' => 'numeric',
            'posicion_necesaria' => 'required|numeric',
            'capacidad_sistema' => 'required|numeric',
            'id_area' => 'required|required',
            'georeferencia' => 'required',
            'ubicacion' => 'required|required',
        ]);

        $sistema = new Sistema;
        $sistema->id_sistema = $request->id_sistema;

        $sistema->id_acueducto = $request->id_acueducto;

        $sistema->nom_sistema = strtoupper($request->nom_sistema);
        $sistema->desc_sistema = strtoupper($request->descripcion);
        $sistema->posiciones = $request->posiciones;
        $sistema->capacidad_sistema = $request->capacidad_sistema;
        $sistema->posicion_necesaria = $request->posicion_necesaria;
        $sistema->id_area = $request->id_area;
        $sistema->georeferencia = strtoupper($request->georeferencia);
        $sistema->ubicacion = strtoupper($request->ubicacion);

        //dd($sistema);
        $sistema->save();

        return redirect()->route('sistemas.index')->with('status', 'Sistema creado satisfactoriamente');
    }
    /**
     * Display the specified resource.
     */
    public function show(Sistema $sistema)
    {
        //dd($sistema->ubicacionesPlantas);
        return view('activos.sistemas.show', compact('sistema',));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sistema $sistema)
    {
        $acueductos = Acueductos::all();
        $areas = Area::all();
        $ubiplantas = UbicacionPlanta::all();
        $maestrosistemas = MaestroSistema::all();
        //dd($maestrosistemas->first());
        return view('activos.sistemas.edit', compact(
            'sistema',
            'acueductos',
            'areas',
            'ubiplantas',
            'maestrosistemas'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sistema $sistema)
    {

        $request->validate([
            'nom_sistema' => 'required',
            'descripcion' => 'required|max:150',
            'posiciones' => 'required|numeric',
            // 'posiciones' => 'numeric',
            'posicion_necesaria' => 'required|numeric',
            'capacidad_sistema' => 'required|numeric',
            'id_area' => 'required|required',
            'georeferencia' => 'required',
            'ubicacion' => 'required|required',
        ]);
        //$sistema->id_sistema = $request->id_sistema;

        //$sistema->id_acueducto = $request->id_acueducto;

        $sistema->nom_sistema = $request->nom_sistema;
        $sistema->desc_sistema = $request->descripcion;
        $sistema->posiciones = $request->posiciones;
        $sistema->posicion_necesaria = $request->posicion_necesaria;

        $sistema->id_area = $request->id_area;


        $sistema->ubicacion = $request->ubicacion;

        $sistema->capacidad_sistema = $request->capacidad_sistema;
        $sistema->georeferencia = $request->georeferencia;

        //dd($sistema);

        $sistema->save();

        return redirect()->route('sistemas.index')->with('status', 'Sistema editado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sistema $sistema)
    {
        //
    }
    public function obtenersistema(Sistema $sistema, Acueductos $acueducto)
    {
        dd($sistema->acueductos());
    }

    public function consultarSistema(Request $request)
    {
        $idSistema = $request->input('id_sistema');
        $idacueducto = $request->input('id_acueducto');


        //dd($idacueducto);
        // Realizar la consulta en la base de datos para verificar si existe
        $sistemaExistente = Sistema::where('id_sistema', $idSistema)->first();

        if ($sistemaExistente) {
            // Consultar el último sistema asociado al acueducto
            $ultimoSistema = Sistema::where('id_acueducto', $idacueducto)->latest('id_sistema')->first();
            //preg_match('/S(\d+)/', $ultimosistema->id_sistema, $matches);
            $corr = substr($ultimoSistema->id_sistema, 5);
            $corr = intval($corr) + 1;
            $newIdSistema = $ultimoSistema->id_acueducto . '-S' . str_pad($corr, 2, '0', STR_PAD_LEFT);
            //dd($newIdSistema);
            return response()->json(['exists' => true, 'newIdSistema' => $newIdSistema]);
        } else {
            // Devuelve una respuesta JSON con el campo "exists" igual a false si el sistema no existe
            return response()->json(['exists' => false]);
        }
    }
}
