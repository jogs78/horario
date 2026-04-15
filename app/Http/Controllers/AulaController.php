<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAulaRequest;
use App\Http\Requests\UpdateAulaRequest;
use App\Models\Aula;


USE Illuminate\Support\Facades\Auth; //autenticacion
use Illuminate\Support\Facades\Gate; //autorizacion
use Illuminate\Support\Facades\Log;  //auditoria
use Illuminate\Support\Facades\Storage; //para poder usar los discos


class AulaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todos = Aula::all();
        return view('aulas.index', ['todos'=>$todos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('aulas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAulaRequest $request)
    {
//        echo "aqui voy a guardar lo que viene en el request";
//        @dump($request);
        $datos = $request->all();
//        @dump($datos);
        $nombre = $request->input('nombre');
        $capacidad = $request->input('capacidad');
        $foto = $request->file('foto');
//        @dump($nombre);
        $nueva = new Aula();
/*
        $nueva->nombre = $nombre;
        $nueva->capacidad  = $capacidad;
*/
        $ruta = Storage::disk('fotos')->put('aulas',$foto);
        $nueva->fill($datos); 
        $nueva->foto = $ruta;     

        $nueva->save();
        Log::channel('aulas')->info("Aula Creada",["quien"=>Auth::user()->name, "cual:" => $nueva->nombre ]);
        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(Aula $aula) //route model biding
    {
        return view('aulas.show',compact('aula'));
    }

    public function ver(Aula $aula) //route model biding
    {
        //si tiene permiso de ver la foto
        //si cumple con ciertos requisitos
        return response()->download(storage_path('app/fotos/') . $aula->foto);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Aula $aula)
    {
//        $this->authorize('update', $aula); 
        if(Gate::allows('update',$aula)){
            return view('aulas.edit',compact('aula'));
        }else{
            echo "NO PUEDES....";

        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAulaRequest $request, Aula $aula)
    {
        //echo "actualizar...";
        $aula->fill($request->all());
        $foto = $request->file('foto');
//        dd($foto);

        //reemplazar la foto
        if($aula->foto == "nada"){
            $ruta = Storage::disk('fotos')->put('aulas',$foto);
        }else{
            Storage::disk('fotos')->delete($aula->foto);
            $ruta = Storage::disk('fotos')->put('aulas',$foto);
        }
        $aula->foto = $ruta;
        $aula->save();
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Aula $aula)
    {
        $aula->delete(); 
        return redirect('/');
    }
}
