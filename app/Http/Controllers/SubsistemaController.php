<?php

namespace App\Http\Controllers;

use App\Models\Sistema;
use App\Models\Subsistema;
use Illuminate\Http\Request;
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
        return view('activos.subsistema.create', compact('sistemas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Subsistema $subsistema)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subsistema $subsistema)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subsistema $subsistema)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subsistema $subsistema)
    {
        //
    }
}
