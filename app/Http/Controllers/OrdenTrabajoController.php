<?php

namespace App\Http\Controllers;

use App\Models\Acueductos;
use App\Models\GrupoHerramienta;
use App\Models\Herramienta;
use App\Models\OdtUsuario;
use App\Models\OrdenTrabajo;
use App\Models\Sistema;
use App\Models\Subsistema;
use App\Models\Tarea;
use App\Models\TareaGrupoHerramienta;
use App\Models\TipoOrdenTrabajo;
use App\Models\PrioridadOrdenTrabajo;
use App\Models\Equipo;
use App\Models\User;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use App\Http\Controllers\Pdf\OrdendetrabajoPDF;
use Codedge\Fpdf\Fpdf\Fpdf;
class OrdenTrabajoController extends Controller
{
    protected $fpdf;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $odt = OrdenTrabajo::all();
        return view('mantenimiento.ordentrabajo.page', compact('odt'));
    }


    public function  pdfff(){
        $dompdf = new Dompdf();
        $html = view('mantenimiento.ordentrabajo.pdf')->render();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream();
    }
    public function pdf($ordenTrabajo){

        $odt = OrdenTrabajo::where('id_orden',$ordenTrabajo)->first();
        //dd($odt);
        $pdf = new OrdendetrabajoPDF();

        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->Content($odt);
        $pdf->Output();

        exit;

        /*$this->fpdf = new Fpdf;
        $this->fpdf->SetFont('Arial', 'B', 15);
        $this->fpdf->AddPage("L", ['200', '200']);
        $this->fpdf->Text(10, 10, "Orden de trabajo");
        $this->fpdf->PageNo(1);
        $this->fpdf->Output();

        exit;*/

       //dd($odt);
       //return view('mantenimiento.ordentrabajo.pdf', compact('odt'));
       /*$pdf= PDF::loadView('mantenimiento.ordentrabajo.pdf', compact('odt'));
       $pdf->render();
         return $pdf->stream('reporte_orden_trabajo.pdf');*/

       // return view('mantenimiento.ordentrabajo.pdf');
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
        $datosodt = $request->input('odt');
        $odt = new OrdenTrabajo;


        $odt->id_acueducto = $datosodt['id_acueducto'];
        $odt->descrip_ot = $datosodt['descrip_ot'];
        $odt->id_sistema = $datosodt['id_sistema'];
        $odt->id_subsistema = $datosodt['id_equipo'];
        $odt->id_tipo_ot = $datosodt['id_tipo_orden'];
        $odt->id_prioridad = $datosodt['id_prioridad'];
        $odt->dias = $datosodt['dias'];
        $odt->fecha = Carbon::now()->toDateString();
        $odt->fecha_inicio = $datosodt['fecha_inicio'];
        //dd($odt->fecha_inicio);
        $odt->fecha_final = $datosodt['fecha_final'];
        $odt->observacion = $datosodt['observacion'];


        $odt->save();

        $datosmanoobra = $request->input('data');


        foreach ($datosmanoobra as $dato) {



            $obreros = OdtUsuario::create([
                'id_orden' => $odt->id_orden,
                'cedula' => $dato['cedula'],
            ]);

        }


        return response()->json(['success' => true, 'odt' => $odt]);
    }

    /**
     * Display the specified resource.
     */
    public function show($ordenTrabajo)
    {

        $registro = OrdenTrabajo::findOrFail($ordenTrabajo);

        $id_subsistema = $registro->id_subsistema;
        $datosodtobrero = $registro->obreros;
        $obreros = OdtUsuario::where('id_orden', $ordenTrabajo)->get();
        //dd($obreros);
        $equipos = Equipo::where('id_subsistema', $registro->id_subsistema)->get();
//        $tareas = Tarea::where('id_tipo_eq', $equipos->id_tipo_eq)->get();
        //$tareas = $equipos->tareas();

        $coleccionEq = array();

        foreach ($equipos as $equipo){
            $tareas  = $equipo->tareas;
            foreach ($tareas as $tarea){
                $col = $tarea->tarea;
                $col1 =  $tarea->id_tareas;
                $col3 = $tarea->id_tipo_eq;
                $nuevoItem = array(
                    'id_tareas' => $col1,
                    'tarea' => $col,
                    'id_tipo_eq' => $col3,
                );
                //dd($nuevoItem);
                array_push($coleccionEq, $nuevoItem);
            }
        }
        $coleccionGrHr = array();
        foreach ($coleccionEq as $item){
            $id = $item['id_tareas'];
            $item1 = TareaGrupoHerramienta::where('id_tarea', $id)->get();
            foreach ($item1 as $item2){
                $co = $item2->id_tarea;
                $co1 =  $item2->id_grupo_herramienta;
                $coleccionGrEq = array(
                    'id_tarea' => $co,
                    'id_grupo_herramienta' => $co1,
                );
                array_push($coleccionGrHr, $coleccionGrEq);
            }
        }
        $colecciontahr = array();
        foreach ($coleccionGrHr as $item3){
            $grherram = GrupoHerramienta::where('id_grupo_herramienta', $item3['id_grupo_herramienta'])->get();
            $trname = Tarea::where('id_tareas', $item3['id_tarea'])->get();
            foreach ($trname as $trana){
                $nametr = $trana['tarea'];
            }
            foreach ($grherram as $grhe){
                $namegrhe = $grhe['nombre_grupo'];
            }
            // Agregamos los nuevos elementos al array
            $colecciontahr[] = array(
                'tarea' => $nametr,
                'nombre_grupo' => $namegrhe,
            );

        }

        $acueducto = Acueductos::findOrFail($registro->id_acueducto);
        $area = Sistema::findOrFail($registro->id_sistema);
        $equipo = Subsistema::findOrFail($registro->id_subsistema);
        $tipo = TipoOrdenTrabajo::findOrFail($registro->id_tipo_ot);
       // dd($tipo);

        return view('mantenimiento.ordentrabajo.show', compact('registro',
        'acueducto',
            'area',
            'equipo',
            'tipo',
            'obreros',
            'equipos',
            'colecciontahr'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($ordenTrabajo)
    {
        //dd(intval($ordenTrabajo));
//        $odtusu = OdtUsuario::with('obreros')->where('id_orden', $ordenTrabajo)->get();
        $obreros = OdtUsuario::where('id_orden', $ordenTrabajo)->get();

        $usuario = [];

        /*foreach ($odtusu as $usu){
            $obreros[] = $usu->cedula;

        }*/

        /*$usua = User::whereIn('cedula', $obreros)->get()->keyBy('cedula');
       // $usuario = User::whereIn('cedula', $obreros)->pluck('nombre', 'cedula');;
        foreach ($odtusu as $usu){
            $obreros = $usu->cedula;
            foreach ($obreros as $obrero){
                $usuario = $usua[$obrero];

            }
        }*/
       // dd($usuario);
       // $usu = User::where('cedula', $odtusu->cedula)-get();
      //  $odtusu = OdtUsuario::where('id_orden',$ordenTrabajo)->get();
        $usuarios = User::all();
        /*foreach ($obreros as $obrero){*/
//            $usuario [] = User::where('cedula', $obrero)->pluck();
//        }
       // dd($usuario);
        $orden = OrdenTrabajo::where('id_orden',$ordenTrabajo)->first();
        $acueductos = Acueductos::all();
        $sistemas = Sistema::all();
        $subsistemas = Subsistema::all();
        $tiposorden = TipoOrdenTrabajo::all();
        $ordenprioridad = PrioridadOrdenTrabajo::all();



        //dd($usu);

        return view('mantenimiento.ordentrabajo.edit', compact('orden',
        'acueductos',
        'sistemas',
        'subsistemas',
        'tiposorden',
        'ordenprioridad',
        'usuarios',
        'obreros',
        'usuario'));
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
            $equipos = Subsistema::where('id_sistema',$request->texto)->get();
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
