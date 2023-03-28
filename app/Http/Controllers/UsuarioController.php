<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use App\Models\User;
use App\Models\Grupo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $usuarios = User::orderBy('cedula','desc')->get();

        return view('admin.usuarios.page', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        if (Gate::allows('esSU')) {
            if ($request->ajax()){
                $rol = Rol::where('id', $request->rol_id)->first();

                $permisos = $rol->permisos;
                return $permisos;
            }
            $roles = Rol::all();

            return view('admin.usuarios.create', compact('roles'));
        }else{
            dd('El usuario no es super usuario');
        }



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
        $usuario = new User;

        $usuario->cedula = $request->cedula;
        $usuario->nombre = $request->nombre;
        $usuario->usuario = $request->usuario;
        $usuario->cargo = $request->cargo;

        $usuario->save();

        if ($request->rol != null){
            $usuario->roles()->attach($request->rol);
            $usuario->save();
        }

        if ($request->permiso =! null){
            foreach ($request->permisos as $permiso){
                $usuario->permisos()->attach($permiso);
                $usuario->save();
            }
        }

        return redirect()->route('usuarios.index')->with('status', 'Usuario Creado Satisfactoriamente');

    }

    /**
     * Display the specified resource.
     */
    public function show(User $usuario)
    {


        return view('admin.usuarios.show', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $usuario)
    {
        $roles = Rol::get();
        $usuarioRol = $usuario->roles->first();
        if($usuarioRol != null){
            $rolPermisos = $usuarioRol->permisos;

        }else {
            $rolPermisos = null;
        }

        $usuarioPermisos = $usuario->permisos;

        //dd($rolPermisos);

        return view('admin.usuarios.edit', compact('usuario',
            'roles',
            'usuarioRol',
            'rolPermisos',
            'usuarioPermisos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $usuario)
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

        $usuario->roles()->detach();
        $usuario->permisos()->detach();

        if($request->rol == 'Seleccionar rol...'){

            $usuario->roles()->detach();
            $usuario->permisos()->detach();
            $usuario->save();
        }else if($request->rol != null){
            $usuario->roles()->attach($request->rol);
            $usuario->save();
        }

        if($request->permisos != null){
            foreach ($request->permisos as $permiso){
                $usuario->permisos()->attach($permiso);
                $usuario->save();
            }
        }

        return redirect()->route('usuarios.index')->with('status', 'Editado Satisfactoriamente, el usuario con cedula: '.$usuario->cedula);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $usuario)
    {
        $usuario->roles()->detach();
        $usuario->permisos()->detach();
        $usuario->delete();

        return redirect()->route('usuarios.index')->with('status', 'Eliminado Satisfactoriamente, el usuario con cedula: '.$usuario->cedula);
    }
}
