<?php

namespace App\Http\Controllers;

use App\Models\Estatu;
use App\Models\Sistema;
use App\Models\Subsistema;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
        $estatus = Estatu::all();
        return view('activos.subsistema.create', compact('sistemas','estatus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'id_subsistema' => 'required|unique:ope_subsistema,id_subsistema',
            'id_sistema' => 'required',
            'nombre_subsistema' => 'required',
            'desc_subsistema' => 'required',
            'capacidad_subsistema' => 'required|numeric',
            'id_estatus' => 'required',
        ]);
        //dd($request);

        $subsistema = new Subsistema;
        $subsistema->id_subsistema = $request->id_subsistema;
        $subsistema->id_sistema = $request->id_sistema;
        $subsistema->nombre_subsistema = strtoupper($request->nombre_subsistema);
        $subsistema->desc_subsistema = strtoupper($request->desc_subsistema);
        $subsistema->id_estatus = $request->id_estatus;
        $subsistema->capacidad_subsistema = $request->capacidad_subsistema;
        $subsistema->observacion = strtoupper($request->observacion);
        //dd($subsistema);

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
        $estatus = Estatu::all();

        $sistemas = Sistema::all();

        return view('activos.subsistema.edit', compact('subsistema',
        'sistemas', 'estatus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subsistema $subsistema)
    {
        $request->validate([
            'id_sistema' => 'required',
            'id_subsistema' => [
                'max:80',
                'string',
                Rule::unique('ope_subsistema', 'id_subsistema')->ignore($subsistema->id_subsistema, 'id_subsistema'),
            ],
            'nombre_subsistema' => 'required',
            'desc_subsistema' => 'required',
            'capacidad_subsistema' => 'required|numeric',
        ]);
        $subsistema->id_sistema = $request->id_sistema;
        $subsistema->id_subsistema = $request->id_subsistema;
        $subsistema->nombre_subsistema = $request->nombre_subsistema;
        $subsistema->desc_subsistema = $request->desc_subsistema;
        $subsistema->capacidad_subsistema = $request->capacidad_subsistema;
        $subsistema->observacion = $request->observacion;

        //dd($subsistema);

        $subsistema->save();

        return redirect()->route('subsistemas.index')->with('status', 'Subsistema: '.$subsistema->nombre_subsistema.' actualizado correctamente');
        //dd($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subsistema $subsistema)
    {
        //
    }

    public function consultar_subsistema(Request $request)
    {
        //dd($request);
        $idSistema = $request->input('id_sistema');
        $id_subsistema = $request->input('id_subsistema');


        //dd($id_subsistema);
        // Realizar la consulta en la base de datos para verificar si existe
        $subsistemaExistente = Subsistema::where('id_subsistema', $id_subsistema)->first();

        if ($subsistemaExistente) {
            // Consultar el último sistema asociado al acueducto
            $ultimoSubsistema = Subsistema::where('id_sistema', $idSistema)->latest('id_subsistema')->first();
            //preg_match('/S(\d+)/', $ultimosistema->id_sistema, $matches);
            $corr = substr($ultimoSubsistema->id_subsistema, 10);
            $corr = intval($corr) + 1;
            $newIdSubistema = $ultimoSubsistema->id_sistema . '-SB' . str_pad($corr, 2, '0', STR_PAD_LEFT);
            //dd($newIdSubistema);
            return response()->json(['exists' => true, 'newIdSubistema' => $newIdSubistema]);
        } else {
            // Devuelve una respuesta JSON con el campo "exists" igual a false si el sistema no existe
            return response()->json(['exists' => false]);
        }
    }
}
