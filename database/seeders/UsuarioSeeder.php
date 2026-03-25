<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nuevo = new Usuario();
        $nuevo->nombre = "Juan Perez";
        $nuevo->nombre_de_usuario = "jperez";
        $nuevo->clave = Hash::make("123");
        $nuevo->save();

        $nuevo = new Usuario();
        $nuevo->nombre = "Mario Lopez";
        $nuevo->nombre_de_usuario = "mlopez";
        $nuevo->clave = Hash::make("123");
        $nuevo->save();
    }
}
