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
use Illuminate\Validation\Rule;
use Illuminate\Http\Response;


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
    public function createtipoeq()
    {

        $tipos_eq = TipoEquipo::all();
        return view('activos.equipos.createtipoeq', compact('tipos_eq'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(Equipo $equipo)
    {
        //$equipo = null;
        $tiposequipos = TipoEquipo::get();
        $subsistemas = Subsistema::get();
        $marcas = Marca::get();
        $modelos = Modelo::get();
        $sistemas = Sistema::get();
        //$subsistemas = Subsistema::get();
        //dd($modelos->first());
        return view('activos.equipos.create', compact(
            'tiposequipos',
            'subsistemas',
            'marcas',
            'modelos',
            'sistemas',
            'equipo'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //dd($request);

        $equipos = Equipo::all();

        // if ($equipos->count() == 0) {
        //     $idEquipo = $request->id_equipo. 'E01';

        // }
        //dd($request);
        $request->validate([
            'id_sistema' => 'required',

            'id_equipo' => 'required|unique:ope_equipo,id_equipo',
            'id_subsistema' => 'required',
            'desc_equipo' => 'required',

            // 'nvecrep' => 'numeric',
            // 'permant' => 'string|max:4',

            // 'id_tipo_eq' => 'required',
            // 'fecha_adquisicion' => 'required|date',
            // 'fecha_instalacion' => 'required|date',
            // 'num_etapas' => 'numeric',
            // 'modelo' => 'required',
            // 'marca' => 'required',

        ]);

        $equipo = new Equipo;

        $equipo->id_equipo = $request->id_equipo;
        $equipo->id_sistema = $request->id_sistema;
        $equipo->id_subsistema = $request->id_subsistema;
        $equipo->id_sistema = $request->id_sistema;
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
        $equipo->clase_islamiento = $request->clase_islamiento;
        $equipo->lubricacion = $request->lubricacion;
        $equipo->id_tipo_eq = $request->id_tipo_eq;
        //$equipo->id_estatus = $request->id_estatus;
        //$equipo->fabricante = $request->fabricante;
        $equipo->amperios = $request->amperios;
        $equipo->ciclos = $request->ciclos;
        $equipo->aceite = $request->aceite;
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
        //$equipo->frecuencia = $request->frecuencia;
        $equipo->grasa = $request->grasa;
        $equipo->cantidad_rd_inf = $request->cantidad_rd_inf;
        $equipo->tipo_filtro = $request->tipo_filtro;
        $equipo->cantidad_rd_sup = $request->cantidad_rd_sup;
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
       // $equipo->dias_almacenamiento = $request->dias_almacenamiento;
        $equipo->rango = $request->rango;
        $equipo->peso = $request->peso;
        $equipo->cabezal = $request->cabezal;
        $equipo->eficiencia_maxima = $request->eficiencia_maxima;
        $equipo->diseno = $request->diseno;
        $equipo->cuerpo = $request->cuerpo;
        $equipo->modelo = $request->modelo;
        $equipo->marca = $request->marca;

        //dd($equipo);

        $equipo->save();

        return redirect()->route('equipos.index')->with('status', 'Equipo Creado satisfactoriamente');
    }

    public function storetipoeq(Request $request)
    {


        $request->validate([
            'nombre_tipoeq' => 'required|max:6|unique:ope_tipo_eq,nombre_tipeq',
            'descripcion_tieq' => 'required|max:150|unique:ope_tipo_eq,descripcion_tieq',
        ]);
        $tipo_eq = new TipoEquipo;

        $primer_tipos_equipos = TipoEquipo::orderBy('id_tipo_eq', 'desc')->first();
        //dd($primer_tipos_equipos);
        if ($primer_tipos_equipos == null) {
            $tipo_eq->id_tipo_eq = '0001';
        } else {
            $auxid = intval($primer_tipos_equipos->id_tipo_eq) + 1;


            $auxid = str_pad($auxid, 4, '0', STR_PAD_LEFT);

            $tipo_eq->id_tipo_eq = $auxid;
        }


        $tipo_eq->nombre_tipeq = $request->nombre_tipoeq;
        $tipo_eq->descripcion_tieq = trim(strtoupper($request->descripcion_tieq));


        $tipo_eq->save();

        return redirect()->route('equipos.createtipoeq')->with('status', 'Grupo de equipo Creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Equipo $equipo)
    {
        //dd($equipo->marcas);
        return view('activos.equipos.show', compact('equipo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Equipo $equipo)
    {
        //$datosDeEdicion = Equipo::findOrFail($equipo);

        $sistemas = Sistema::get();
        $tiposequipos = TipoEquipo::get();
        $subsistemas = Subsistema::get();
        $marcas = Marca::get();
        $modelos = Modelo::get();
        //dd($modelos->first());
        return view('activos.equipos.edit', compact(
            'equipo',
            'sistemas',
            'tiposequipos',
            'subsistemas',
            'marcas',
            'modelos',
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Equipo $equipo)
    {

        $request->validate([
           // 'id_equipo' => 'required',
           // 'id_subsistema' => 'required',
            'desc_equipo' => 'required',

            // 'nvecrep' => 'numeric',
            // 'permant' => 'string|max:4',

            // 'id_tipo_eq' => 'required',
            // 'fecha_adquisicion' => 'required|date',
            // 'fecha_instalacion' => 'required|date',
            // 'num_etapas' => 'numeric',
            // 'modelo' => 'required',
            // 'marca' => 'required',

        ]);

      //  $equipo->id_equipo = $request->id_equipo;
       // $equipo->id_sistema = $request->id_sistema;
       // $equipo->id_subsistema = $request->id_subsistema;
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
       $equipo->clase_islamiento = $request->clase_islamiento;
       $equipo->lubricacion = $request->lubricacion;
       $equipo->id_tipo_eq = $request->id_tipo_eq;
       //$equipo->id_estatus = $request->id_estatus;
       //$equipo->fabricante = $request->fabricante;
       $equipo->amperios = $request->amperios;
       $equipo->ciclos = $request->ciclos;
       $equipo->aceite = $request->aceite;
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
       //$equipo->frecuencia = $request->frecuencia;
       $equipo->grasa = $request->grasa;
       $equipo->cantidad_rd_inf = $request->cantidad_rd_inf;
       $equipo->tipo_filtro = $request->tipo_filtro;
       $equipo->cantidad_rd_sup = $request->cantidad_rd_sup;
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
      // $equipo->dias_almacenamiento = $request->dias_almacenamiento;
       $equipo->rango = $request->rango;
       $equipo->peso = $request->peso;
       $equipo->cabezal = $request->cabezal;
       $equipo->eficiencia_maxima = $request->eficiencia_maxima;
       $equipo->diseno = $request->diseno;
       $equipo->cuerpo = $request->cuerpo;
       $equipo->modelo = $request->modelo;
       $equipo->marca = $request->marca;

        //dd($equipo);

        $equipo->save();

        return redirect()->route('equipos.index')->with('status', 'Equipo: ' . $equipo->id_equipo . ' Editado satisfactoriamente');
    }

    public function updateTipo(Request $request, $id)
    {
        try {
            $grupos = TipoEquipo::all();
            $grupo = $grupos->find($request->input('grupoId'));
            $request->validate([
                'descripcion_tieq' => [
                    'required',
                    'string',
                    Rule::unique('ope_tipo_eq', 'descripcion_tieq')->ignore($grupo->descripcion_tieq, 'descripcion_tieq'),
                ],
            ]);

            $grupo->descripcion_tieq = strtoupper($request->input('descripcion_tieq'));

            $grupo->save();

            // Crear un mensaje de éxito
            $mensajeExito = ['mensaje' => 'El Tipo de equipo se actualizó correctamente'];

            // Devolver una respuesta JSON con el mensaje de éxito
            return response()->json($mensajeExito);
        } catch (\Exception $e) {
            // Devolver una respuesta JSON con el mensaje de error y el código de estado 422
            return response()->json(['error' => 'Error en la actualización del Tipo de equipo', 'mensaje' => $e->getMessage()], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Equipo $equipo)
    {
        //
    }

    public function obtenerFormularioEdicion($id)
    {
        // Obtén el grupo con el ID proporcionado desde la base de datos utilizando Eloquent.
        $grupo = TipoEquipo::find($id);
        // Verifica si se encontró el grupo.
        if (!$grupo) {
            return response()->json(['error' => 'Grupo no encontrado'], 404);
        }


        // Retorna el formulario de edición utilizando la vista Blade "formulario_edicion.blade.php"
        return view('activos.equipos.formgrupoherr', ['tipo' => $grupo]);
    }

    public function consultarSistema(Request $request)
    {
        $idSubSistema = $request->input('id_subsistema');
        $idEquipo = $request->input('id_equipo');


        //dd($idacueducto);
        // Realizar la consulta en la base de datos para verificar si existe
        $equipoExistente = Equipo::where('id_subsistema', $idSubSistema)->first();
        //dd($equipoExistente);
        if ($equipoExistente) {
            // Consultar el último sistema asociado al acueducto
            $ultimoEquipo = Equipo::where('id_subsistema', $idSubSistema)->latest('id_subsistema')->first();
            //preg_match('/S(\d+)/', $ultimosistema->id_sistema, $matches);
            $corr = substr($ultimoEquipo->id_equipo, 14);
            $corr = intval($corr) + 1;
            // dd($ultimoEquipo->id_subsistema);

            $newIdEquipo = $ultimoEquipo->id_subsistema . '-E' . str_pad($corr, 2, '0', STR_PAD_LEFT);
            //dd($newIdEquipo);
            return response()->json(['exists' => true, 'newIdEquipo' => $newIdEquipo]);
        } else {
            // Devuelve una respuesta JSON con el campo "exists" igual a false si el sistema no existe
            return response()->json(['exists' => false]);
        }
    }

    public function getSubsistemas($sistemaId)
    {

        $subsistemas = Subsistema::where('id_sistema', $sistemaId)->get();
        $subsistemasArray = $subsistemas->pluck('nombre_subsistema', 'id_subsistema')->toArray();

        //dd($subsistemas);
        return response()->json($subsistemasArray);
    }
}
