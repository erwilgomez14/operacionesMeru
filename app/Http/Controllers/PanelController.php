<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use App\Models\User;
use App\Models\UsuarioRol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PanelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(User $usuario)
    {
        $roles = Rol::get();
        $user = Auth::user();

        $usuario = $usuario->where('cedula', $user->cedula)->get();
        //$usuario = $usuario->roles;
        //dd($usuario);
        $rolUsuario = UsuarioRol::get();

        $rolUsuario = $rolUsuario->where('cedula',$user->cedula)->toArray();



        //$roles = $roles->where('id', $rolUsuario'rol_id');
       // $usuario = $usuario->;
        //$usuarioRol = $usuario->roles->first();
        //if($usuarioRol != null){
         //   $rolPermisos = $usuarioRol->permisos;

        //}else {
          //  $rolPermisos = null;
        //}
        //$usuarioPermisos = $usuario->permisos;
//        $usuario1 = $usuario->roles;


        return view('panel.page' , compact('usuario'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
