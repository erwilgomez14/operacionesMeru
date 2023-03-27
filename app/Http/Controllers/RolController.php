<?php

namespace App\Http\Controllers;

use App\Models\Permiso;
use App\Models\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Rol::orderBy('id', 'desc')->get();
        return view('admin.roles.page', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $request->validate([
            'nombre_rol' => 'required|max:255',
            'rol_slug' => 'required|max:255',
        ]);

        $rol = new Rol;

        $rol->nombre = $request->nombre_rol;
        $rol->slug = $request->rol_slug;

        $rol->save();

        $listapermisos = explode(',', $request->rol_permiso);
        foreach ($listapermisos as $permiso) {
            $permisos = new Permiso();
            $permisos->nombre = $permiso;
            $permisos->slug = strtolower(str_replace(" ", "-", $permiso));
            $permisos->save();

            $rol->permisos()->attach($permisos->id);
            $rol->save();
        }

        return redirect()->route('rol.index')->with('status', 'Rol creado satisfactoriamente');

    }

    /**
     * Display the specified resource.
     */
    public function show(Rol $rol)
    {
        return view('admin.roles.show', compact('rol'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rol $rol)
    {
        return view('admin.roles.edit', compact('rol'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rol $rol)
    {
        $request->validate([
            'nombre_rol' => 'required|max:255',
            'rol_slug' => 'required|max:255',
        ]);

        $rol->nombre = $request->nombre_rol;
        $rol->slug = $request->rol_slug;

        $rol->save();

        $rol->permisos()->delete();
        $rol->permisos()->detach();

        $listapermisos = explode(',', $request->rol_permiso);
        foreach ($listapermisos as $permiso) {
            $permisos = new Permiso();
            $permisos->nombre = $permiso;
            $permisos->slug = strtolower(str_replace(" ", "-", $permiso));
            $permisos->save();

            $rol->permisos()->attach($permisos->id);
            $rol->save();
        }

        return redirect()->route('rol.index')->with('status', 'Rol editado satisfactoriamente');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rol $rol)
    {
        $rol->permisos()->delete();
        $rol->delete();
        $rol->permisos()->detach();

        return redirect()->route('rol.index')->with('status', 'Rol eliminado satisfactoriamente');
    }
}
