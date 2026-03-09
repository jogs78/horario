<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMobiliarioRequest;
use App\Http\Requests\UpdateMobiliarioRequest;
use App\Models\Mobiliario;

class MobiliarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $todos = Mobiliario::all();
        return $todos->toJson();
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMobiliarioRequest $request)
    {
        $nuevo = new Mobiliario();
        $nuevo->descripcion = $request->input('descripcion');
        $nuevo->aula_id = $request->input('aula_id');
        $nuevo->save();
        return $nuevo->toJson();
    }

    /**
     * Display the specified resource.
     */
    public function show(Mobiliario $mobiliario)
    {
        return $mobiliario->toJson();
         //   return view('aulas.show',compact('aula'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMobiliarioRequest $request, Mobiliario $mobiliario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mobiliario $mobiliario)
    {
        //
    }
}
