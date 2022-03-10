<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;

class MaestrosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
      DB::table('maestros')
          ->insert([
          			[ 'titulo' => 'Escritorio', 'idpadre' => 1, 'ruta' => 'home', 'tipo' => 'ver'],
                    [ 'titulo' => 'Órdenes', 'idpadre' => 2, 'ruta' => 'ordenes', 'tipo' => 'ver'],
                    [ 'titulo' => 'Configuración', 'idpadre' => 3, 'ruta' => '', 'tipo' => 'ver'],
                    [ 'titulo' => 'Usuarios', 'idpadre' => 4, 'ruta' => 'usuarios.create', 'tipo' => 'agregar'],
                    [ 'titulo' => 'Roles', 'idpadre' => 5, 'ruta' => 'usuarios.index', 'tipo' => 'ver'],
                    [ 'titulo' => 'Reset/Password', 'idpadre' => 6, 'ruta' => 'resetPassword', 'tipo' => 'ver'],
                    [ 'titulo' => 'Clientes', 'idpadre' => 7, 'ruta' => 'clientes', 'tipo' => 'ver']
       
                 
                ]);
    }
}
