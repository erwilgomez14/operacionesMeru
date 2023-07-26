<?php

namespace App\Http\Controllers;

use App\Models\Herramienta;
use App\Models\GrupoHerramienta;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class HerramientaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $herramientas = Herramienta::all();
        return view('activos.herramientas.page', compact('herramientas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $grupos = GrupoHerramienta::orderBy('id_herramienta', 'asc')->get();
        return view('activos.herramientas.create', compact('grupos'));
    }
    public function creategroup()
    {
        $grupos = GrupoHerramienta::all();
        // dd($grupos);
        return view('activos.herramientas.creategroup', compact('grupos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'nombre_herramienta' => 'required',

        ]);


        $herramienta = new Herramienta;
        $herramienta->nombre_herramienta = trim(strtoupper($request->nombre_herramienta));
        $herramienta->id_grupo_herramienta = $request->id_grupo_herramienta;
        $herramienta->save();

        return redirect()->route('herramientas.index')->with('status', 'Herramienta creada satisfactoriamente');
    }
    public function storegroup(Request $request)
    {
        $request->validate([
            'nombre_grupo' => 'required|unique:ope_grupo_herramienta,nombre_grupo',
        ]);

        $grupo = new GrupoHerramienta();
        $grupo->nombre_grupo = trim(strtoupper($request->nombre_grupo));

        $grupos = GrupoHerramienta::where('nombre_grupo',$grupo->nombre_grupo)->get();
        if ($grupos->count() > 0) {
            // Si se encontraron registros con el mismo nombre, retorna un mensaje de error
            return redirect()->back()->withErrors(['nombre_grupo' => 'El nombre del grupo ya está registrado.'])->withInput();
        }
        

        $grupo->save();
        return redirect()->route('herramientas.creategroup')->with('status', 'Grupo de tareas creado satisfactoriamente');
    }
    /**
     * Display the specified resource.
     */
    public function show(Herramienta $herramienta)
    {
        return view('activos.herramientas.show', compact('herramienta'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Herramienta $herramienta)
    {
        $grupos = GrupoHerramienta::all();

        return view('activos.herramientas.edit', compact('herramienta','grupos'));
        
    }

    public function obtenerFormularioEdicion($id)
    {
        // Obtén el grupo con el ID proporcionado desde la base de datos utilizando Eloquent.
        $grupo = GrupoHerramienta::find($id);
        // Verifica si se encontró el grupo.
        if (!$grupo) {
            return response()->json(['error' => 'Grupo no encontrado'], 404);
        }


        // Retorna el formulario de edición utilizando la vista Blade "formulario_edicion.blade.php"
        return view('activos.herramientas.formgrupoherr', ['grupo' => $grupo]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Herramienta $herramienta)
    {
        $request->validate([
            'nombre_herramienta' => [
                'required',
                'string',
                Rule::unique('ope_herramientas', 'nombre_herramienta')->ignore($herramienta->nombre_herramienta, 'nombre_herramienta'),
            ],
        ]);
        $herramienta->nombre_herramienta = trim(strtoupper($request->nombre_herramienta));
        $herramienta->id_grupo_herramienta = $request->id_grupo_herramienta;
        $herramienta->save();

        return redirect()->route('herramientas.index')->with('status', 'Herramienta: '.$herramienta->id_herramienta.' editada satisfactoriamente');
    }

    public function updateGroup(Request $request, $id)
    {
        try {
            $grupos = GrupoHerramienta::all();
            $grupo = $grupos->find($request->input('grupoId'));

            $request->validate([
                'nombre_grupo' => [
                    'required',
                    'string',
                    Rule::unique('ope_grupo_herramienta', 'nombre_grupo')->ignore($grupo->nombre_grupo, 'nombre_grupo'),
                ],
            ]);

            $grupo->nombre_grupo = strtoupper($request->input('nombre_grupo'));
            $grupo->save();

            // Crear un mensaje de éxito
            $mensajeExito = ['mensaje' => 'El grupo se actualizó correctamente'];

            // Devolver una respuesta JSON con el mensaje de éxito
            return response()->json($mensajeExito);
        } catch (\Exception $e) {
            // Devolver una respuesta JSON con el mensaje de error y el código de estado 422
            return response()->json(['error' => 'Error en la actualización del grupo', 'mensaje' => $e->getMessage()], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Herramienta $herramienta)
    {
        //
    }
}
