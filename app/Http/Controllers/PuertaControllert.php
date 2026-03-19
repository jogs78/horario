<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PuertaControllert extends Controller
{
    public function ingresar(){
        return view('sistema.entrada');
    }
    public function validar(Request $peticion){
        $encontrado = User::where('email', $peticion->input('usuario'))->first();
        if(is_null($encontrado)){
            echo "no hay";
        }else{
            echo "revisar su clave";
            echo "tiene: " . $encontrado->password . "<br>";
            echo "el puso:" . $peticion->input('clave'). "<br>";
            //if ($encontrado->password == $peticion->input('clave')){
            if (Hash::check($peticion->input('clave'),$encontrado->password)){
                echo "puede entrar porque la clave es igual";
                Auth::login($encontrado);
                return redirect('/');
            }else{
                echo "fallo de autenticacion la clave no es la de la base de datos.";
            }

        }

    }

    public function salir(){
        Auth::logout();
        return redirect('/');
    }
}
