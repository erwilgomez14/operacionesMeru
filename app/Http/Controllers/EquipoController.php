<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Marca;
use App\Models\Modelo;
use App\Models\Sistema;
use App\Models\Subsistema;
use App\Models\Tarea;
use App\Models\TipoEquipo;
use Illuminate\Http\Request;

class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $equipos = Equipo::get();



        return view('activos.equipos.page', compact('equipos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sistemas = Sistema::get();
        $tiposequipos = TipoEquipo::get();
        $subsistemas = Subsistema::get();
        $marcas = Marca::get();
        $modelos = Modelo::get();
        //dd($modelos->first());
        return view('activos.equipos.create', compact('sistemas',
        'tiposequipos',
        'subsistemas',
        'marcas',
        'modelos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $equipo = new Equipo;

        $equipo->id_equipo = $request->id_equipo;
        $equipo->id_sistema = $request->id_sistema;
        $equipo->id_subsistema = $request->id_subsistema;
        $equipo->serial = $request->serial;
        $equipo->desc_equipo = $request->desc_equipo;
        $equipo->potencia = $request->potencia;
        $equipo->velocidad = $request->velocidad;
        $equipo->voltaje = $request->voltaje;
        $equipo->frame = $request->frame;
        $equipo->fs = $request->fs;
        $equipo->peso = $request->peso;
        $equipo->temperatura = $request->temperatura;
        $equipo->nvecrep = $request->nvecrep;
        $equipo->permant = $request->permant;
        $equipo->rpm = $request->rpm;
        $equipo->id_tipo_eq = $request->id_tipo_eq;
        $equipo->id_estatus = $request->id_estatus;
        $equipo->fabricante = $request->fabricante;
        $equipo->amperios = $request->amperios;
        $equipo->ciclos = $request->ciclos;
        $equipo->ph = $request->ph;
        $equipo->capacidad_ac_sup = $request->capacidad_ac_sup;
        $equipo->capacidad_ac_inf = $request->capacidad_ac_inf;
        $equipo->fecha_adquisicion = $request->fecha_adquisicion;
        $equipo->fecha_instalacion = $request->fecha_instalacion;
        $equipo->caudal = $request->caudal;
        $equipo->altura = $request->altura;
        $equipo->descarga = $request->descarga;
        $equipo->longitud_columna = $request->longitud_columna;
        $equipo->succion = $request->succion;
        $equipo->num_etapas = $request->num_etapas;
        $equipo->capacidad = $request->capacidad;
        $equipo->frecuencia = $request->frecuencia;
        $equipo->corriente = $request->corriente;
        $equipo->impedancia = $request->impedancia;
        $equipo->tipo_filtro = $request->tipo_filtro;
        $equipo->rata_filtracion = $request->rata_filtracion;
        $equipo->capacidad_filtracion = $request->capacidad_filtracion;
        $equipo->rendimiento = $request->rendimiento;
        $equipo->perdida_carga = $request->perdida_carga;
        $equipo->area = $request->area;
        $equipo->ancho = $request->ancho;
        $equipo->diametro = $request->diametro;
        $equipo->clase = $request->clase;
        $equipo->flow = $request->flow;
        $equipo->tipo = $request->tipo;
        $equipo->presion = $request->presion;
        $equipo->material = $request->material;
        $equipo->sustancia = $request->sustancia;
        $equipo->dias_almacenamiento = $request->dias_almacenamiento;
        $equipo->rango = $request->rango;
        $equipo->precision = $request->precision;
        $equipo->capacidad_dinamica = $request->capacidad_dinamica;
        $equipo->eficiencia_maxima = $request->eficiencia_maxima;
        $equipo->diseno = $request->diseno;
        $equipo->cuerpo = $request->cuerpo;
        $equipo->modelo = $request->modelo;
        $equipo->marca = $request->marca;

        //dd($equipo);

        $equipo->save();

        return redirect()->route('equipos.index')->with('status','Equipo Creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Equipo $equipo)
    {
        return view('activos.equipos.show', compact('equipo'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Equipo $equipo)
    {

        $sistemas = Sistema::get();
        $tiposequipos = TipoEquipo::get();
        $subsistemas = Subsistema::get();
        $marcas = Marca::get();
        $modelos = Modelo::get();
        //dd($modelos->first());
        return view('activos.equipos.edit', compact('equipo',
            'sistemas',
            'tiposequipos',
            'subsistemas',
            'marcas',
            'modelos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Equipo $equipo)
    {
        $equipo->id_equipo = $request->id_equipo;
        if($request->id_sistema != null){
            $equipo->id_sistema = $request->id_sistema;
        };
        if($request->id_subsistema != null){
            $equipo->id_subsistema = $request->id_subsistema;
        };
        $equipo->serial = $request->serial;
        $equipo->desc_equipo = $request->desc_equipo;
        $equipo->potencia = $request->potencia;
        $equipo->velocidad = $request->velocidad;
        $equipo->voltaje = $request->voltaje;
        $equipo->frame = $request->frame;
        $equipo->fs = $request->fs;
        $equipo->peso = $request->peso;
        $equipo->temperatura = $request->temperatura;
        $equipo->nvecrep = $request->nvecrep;
        $equipo->permant = $request->permant;
        $equipo->rpm = $request->rpm;
        if($request->id_tipo_eq != null){
            $equipo->id_tipo_eq = $request->id_tipo_eq;
        };
        $equipo->id_estatus = $request->id_estatus;
        $equipo->fabricante = $request->fabricante;
        $equipo->amperios = $request->amperios;
        $equipo->ciclos = $request->ciclos;
        $equipo->ph = $request->ph;
        $equipo->capacidad_ac_sup = $request->capacidad_ac_sup;
        $equipo->capacidad_ac_inf = $request->capacidad_ac_inf;
        $equipo->fecha_adquisicion = $request->fecha_adquisicion;
        $equipo->fecha_instalacion = $request->fecha_instalacion;
        $equipo->caudal = $request->caudal;
        $equipo->altura = $request->altura;
        $equipo->descarga = $request->descarga;
        $equipo->longitud_columna = $request->longitud_columna;
        $equipo->succion = $request->succion;
        $equipo->num_etapas = $request->num_etapas;
        $equipo->capacidad = $request->capacidad;
        $equipo->frecuencia = $request->frecuencia;
        $equipo->corriente = $request->corriente;
        $equipo->impedancia = $request->impedancia;
        $equipo->tipo_filtro = $request->tipo_filtro;
        $equipo->rata_filtracion = $request->rata_filtracion;
        $equipo->capacidad_filtracion = $request->capacidad_filtracion;
        $equipo->rendimiento = $request->rendimiento;
        $equipo->perdida_carga = $request->perdida_carga;
        $equipo->area = $request->area;
        $equipo->ancho = $request->ancho;
        $equipo->diametro = $request->diametro;
        $equipo->clase = $request->clase;
        $equipo->flow = $request->flow;
        $equipo->tipo = $request->tipo;
        $equipo->presion = $request->presion;
        $equipo->material = $request->material;
        $equipo->sustancia = $request->sustancia;
        $equipo->dias_almacenamiento = $request->dias_almacenamiento;
        $equipo->rango = $request->rango;
        $equipo->precision = $request->precision;
        $equipo->capacidad_dinamica = $request->capacidad_dinamica;
        $equipo->eficiencia_maxima = $request->eficiencia_maxima;
        $equipo->diseno = $request->diseno;
        $equipo->cuerpo = $request->cuerpo;
        if($request->modelo != null){
            $equipo->modelo = $request->modelo;
        };
        if($request->marca != null){
            $equipo->marca = $request->marca;
        };

       // dd($equipo);

        $equipo->save();

        return redirect()->route('equipos.index')->with('status','Equipo Editado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Equipo $equipo)
    {
        //
    }
}
