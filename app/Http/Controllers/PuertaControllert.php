<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; //autenticacion
use Illuminate\Support\Facades\Hash; //has no reversible 
use Illuminate\Support\Facades\Log;  //auditoria
/*
 Por otro lado, el hash es unidireccional y no se puede obtener la información 
 original a partir del valor hash.
  */

class PuertaControllert extends Controller
{
    public function ingresar(){
        return view('sistema.entrada');
    }
    public function validar(Request $peticion){
        Log::info("Intenta iniciar session" ,[ $peticion->input('usuario')]);
        $encontrado = Usuario::where('nombre_de_usuario', $peticion->input('usuario'))->first();
        if(is_null($encontrado)){
            Log::warning("Intenta iniciar session" ,[ $peticion->input('usuario')]);
            echo "no hay";
        }else{
            Log::warning("Intenta iniciar session sin contraseña" ,[ $peticion->input('usuario')]);
//            echo "revisar su clave";
//            echo "tiene: " . $encontrado->password . "<br>";
//            echo "el puso:" . $peticion->input('clave'). "<br>";
            //if ($encontrado->password == $peticion->input('clave')){
            if (Hash::check($peticion->input('clave'),$encontrado->clave)){
//                echo "puede entrar porque la clave es igual";
                Log::channel('authn')->info("inicio correcto de: " ,[ $peticion->input('usuario')]);
                Auth::login($encontrado);
                return redirect('/');
            }else{
                Log::channel('authn')->error("fallo de autenticacion la clave no es la de la base de datos." ,[ $peticion->input('usuario')]);
//                echo "fallo de autenticacion la clave no es la de la base de datos.";
                return redirect(route('puerta.entrar'));

            }
        }

    }

    public function salir(){
        Auth::logout();
        return redirect('/');
    }
}
