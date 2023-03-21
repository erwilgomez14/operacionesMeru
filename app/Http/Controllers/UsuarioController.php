<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Grupo;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $usuarios = Usuario::orderBy('cedula','desc')->get();

        return view('admin.usuarios.page', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $grupos = Grupo::orderBy('id_grupo')->get();

        return view('admin.usuarios.create', compact('grupos'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $request->validate([
            'cedula' => 'required|unique:ope_usuario|numeric',
            'nombre' => 'required|max:50',
            'usuario' => 'required|max:16',
            'cargo' => 'required|max:50',


        ]);
        $usuario = new Usuario;

        $usuario->cedula = $request->cedula;
        $usuario->nombre = $request->nombre;
        $usuario->usuario = $request->usuario; 
        $usuario->cargo = $request->cargo; 

        $usuario->save();

        return redirect()->route('usuarios.index')->with('status', 'Usuario Creado Satisfactoriamente');

    }

    /**
     * Display the specified resource.
     */
    public function show(Usuario $usuario)
    {


        return view('admin.usuarios.show', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuario $usuario)

    {

        $grupos = Grupo::orderBy('id_grupo')->get();
        return view('admin.usuarios.edit', compact('usuario', 'grupos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usuario $usuario)
    {
        $request->validate([
            'nombre' => 'required|max:50',
            'usuario' => 'required|max:16',
            'cargo' => 'required|max:50',


        ]);

        $usuario->nombre = $request->nombre;
        $usuario->usuario = $request->usuario;
        $usuario->cargo = $request->cargo;
           
        $usuario->save();

        return redirect()->route('usuarios.index')->with('status', 'Editado Satisfactoriamente, el usuario con cedula: '.$usuario->cedula);    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuario $usuario)
    {
        $usuario->delete();

        return redirect()->route('usuarios.index')->with('status', 'Eliminado Satisfactoriamente, el usuario con cedula: '.$usuario->cedula);
    }
}
