<?php

namespace App\Http\Controllers;

use App\Models\Acueductos;
use App\Models\OdtUsuario;
use App\Models\OrdenTrabajo;
use App\Models\Sistema;
use App\Models\Tarea;
use App\Models\TipoOrdenTrabajo;
use App\Models\PrioridadOrdenTrabajo;
use App\Models\Equipo;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use function Sodium\compare;

class OrdenTrabajoController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('mantenimiento.ordentrabajo.page');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $usuarios = User::all();
        $acueductos = Acueductos::all();
        $tiposorden = TipoOrdenTrabajo::all();
        $ordenprioridad = PrioridadOrdenTrabajo::all();
        //dd($ordenprioridad);

        return view('mantenimiento.ordentrabajo.create',
        compact('usuarios',
            'acueductos',
            'tiposorden',
            'ordenprioridad'));

    }

    private $datos_manos_de_obra = [];
    public function guardarmanoobra(Request $request) {

        $this->datos_manos_de_obra = $request->input('data');
;

        /*foreach ($opciones as $opcion) {
            $opcion = new OdtUsuario;
            $opcion

        }*/
        //   dd($opciones);
        return response($this->datos_manos_de_obra);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $odt = new OrdenTrabajo;
        $odt->id_acueducto = $request->id_acueducto;
        $odt->descrip_ot = $request->descrip_ot;
        $odt->id_sistema = $request->id_sistema;
        $odt->id_equipo = $request->id_equipo;
        $odt->id_tipo_ot = $request->id_tipo_orden;
        $odt->id_prioridad = $request->id_prioridad;
        $odt->dias = $request->dias;
        $odt->hora = $request->hora;
        $odt->fecha = Carbon::now()->toDateString();
        $odt->fecha_inicio = $request->fecha_inicio;
        $odt->fecha_final = $request->fecha_final;
        $odt->observacion = $request->observacion;
        $odt->save();
       // dd($odt);
        //$data = ;
       // dd($request->input('data'));
        //dd($request);
        $datosmanoobra = $request->input('data');
        //$userIds = [];

        foreach ($datosmanoobra as $dato) {

            /*//$obrero = User::where('cedula', $dato['cedula'])->first(); // Obtener el usuario a partir de la cédula

            if ($obrero) {
                $userIds[] = $obrero->cedula; // Agregar el ID del usuario a un array
            }*/

            $obreros = OdtUsuario::create([
                'id_orden' => $odt->id_orden,
                'cedula' => $dato['cedula'],
            ]);

        }

        //dd($userIds);

        //$odt->obreros()->attach($userIds);

        //$odtobrero = OdtUsuario::all();
        //dd($odtobrero);

        /*return redirect()->route('ordentrabajo.index')->with('status', 'orden de trabajo creada satisfactoriamente');*/
        return response()->json(['success' => true]);
    }

    /**
     * Display the specified resource.
     */
    public function show(OrdenTrabajo $ordenTrabajo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OrdenTrabajo $ordenTrabajo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OrdenTrabajo $ordenTrabajo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrdenTrabajo $ordenTrabajo)
    {
        //
    }



    public function hasSistema(Request $request){
        if (isset($request->texto)){
            $sistemas = Sistema::where('id_acueducto',$request->texto)->get();
           // dd($sistemas);
            return response()->json([
                'lista' => $sistemas,
                'success' => true
            ]);
        }else {
            return response()->json([
                'success' => false
            ]);
        }
    }
    public function hasEquipo(Request $request){

        if (isset($request->texto)){
            $equipos = Equipo::where('id_sistema',$request->texto)->get();
            return response()->json([
                'lista' => $equipos,
                'success' => true
            ]);
        }else {
            return response()->json([
                'success' => false
            ]);
        }
    }
    public function hasTareas(Request $request){

        if (isset($request->tipoEquipo)){
            $tareas = Tarea::where('id_tipo_eq',$request->tipoEquipo)->get();
            return response()->json([
                'tarea' => $tareas,
                'success' => true
            ]);
        }else {
            return response()->json([
                'success' => false
            ]);
        }
    }



}
