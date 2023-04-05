<?php

namespace App\Http\Controllers;

use App\Models\UbicacionPlanta;
use Illuminate\Http\Request;

class UbicacionPlantaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('mantenimiento.ubicacionplanta.page');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

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
    public function show(UbicacionPlanta $ubicacionPlanta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UbicacionPlanta $ubicacionPlanta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UbicacionPlanta $ubicacionPlanta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UbicacionPlanta $ubicacionPlanta)
    {
        //
    }
}
