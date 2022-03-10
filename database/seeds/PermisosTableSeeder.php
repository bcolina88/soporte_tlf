<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;

class PermisosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('permisos')
          ->insert([
            [ 'idrol' => 1,
              'idmaestro' => 1,
              'agregar' => 1,
              'editar' => 1,
              'ver' => 1,
              'inhabilitar' => 1,
              'borrar' => 1],

            [ 'idrol' => 1,
              'idmaestro' => 2,
              'agregar' => 1,
              'editar' => 1,
              'ver' => 1,
              'inhabilitar' => 1,
              'borrar' => 1],

            [ 'idrol' => 1,
              'idmaestro' => 3,
              'agregar' => 1,
              'editar' => 1,
              'ver' => 1,
              'inhabilitar' => 1,
              'borrar' => 1],

            [ 'idrol' => 1,
              'idmaestro' => 4,
              'agregar' => 1,
              'editar' => 1,
              'ver' => 1,
              'inhabilitar' => 1,
              'borrar' => 1],

            [ 'idrol' => 1,
              'idmaestro' => 5,
              'agregar' => 1,
              'editar' => 1,
              'ver' => 1,
              'inhabilitar' => 1,
              'borrar' => 1],

            [ 'idrol' => 1,
              'idmaestro' => 6,
              'agregar' => 1,
              'editar' => 1,
              'ver' => 1,
              'inhabilitar' => 1,
              'borrar' => 1],

               [ 'idrol' => 1,
              'idmaestro' => 7,
              'agregar' => 1,
              'editar' => 1,
              'ver' => 1,
              'inhabilitar' => 1,
              'borrar' => 1],




             /*----------------------------------CLIENTE-------------------------------------*/

            [ 'idrol' => 2,
              'idmaestro' => 1,
              'agregar' => 0,
              'editar' => 0,
              'ver' => 1,
              'inhabilitar' => 0,
              'borrar' => 0],

            [ 'idrol' => 2,
              'idmaestro' => 2,
              'agregar' => 0,
              'editar' => 0,
              'ver' => 1,
              'inhabilitar' => 0,
              'borrar' => 0],

            [ 'idrol' => 2,
              'idmaestro' => 3,
              'agregar' => 0,
              'editar' => 0,
              'ver' => 0,
              'inhabilitar' => 0,
              'borrar' => 0],

            [ 'idrol' => 2,
              'idmaestro' => 4,
              'agregar' => 0,
              'editar' => 0,
              'ver' => 0,
              'inhabilitar' => 0,
              'borrar' => 0],

            [ 'idrol' => 2,
              'idmaestro' => 5,
              'agregar' => 0,
              'editar' => 0,
              'ver' => 0,
              'inhabilitar' => 0,
              'borrar' => 0],

            [ 'idrol' => 2,
              'idmaestro' => 6,
              'agregar' => 0,
              'editar' => 0,
              'ver' => 1,
              'inhabilitar' => 0,
              'borrar' => 0],

             [ 'idrol' => 2,
              'idmaestro' => 7,
              'agregar' => 0,
              'editar' => 0,
              'ver' => 0,
              'inhabilitar' => 0,
              'borrar' => 0],



           

              /*-------------------------------EMPLEADO----------------------------------------*/

               [ 'idrol' => 3,
              'idmaestro' => 1,
              'agregar' => 0,
              'editar' => 0,
              'ver' => 1,
              'inhabilitar' => 0,
              'borrar' => 0],

            [ 'idrol' => 3,
              'idmaestro' => 2,
              'agregar' => 1,
              'editar' => 1,
              'ver' => 1,
              'inhabilitar' => 0,
              'borrar' => 0],

            [ 'idrol' => 3,
              'idmaestro' => 3,
              'agregar' => 0,
              'editar' => 0,
              'ver' => 0,
              'inhabilitar' => 0,
              'borrar' => 0],

            [ 'idrol' => 3,
              'idmaestro' => 3,
              'agregar' => 0,
              'editar' => 0,
              'ver' => 0,
              'inhabilitar' => 0,
              'borrar' => 0],

            [ 'idrol' => 3,
              'idmaestro' => 5,
              'agregar' => 0,
              'editar' => 0,
              'ver' => 0,
              'inhabilitar' => 0,
              'borrar' => 0],

            [ 'idrol' => 3,
              'idmaestro' => 6,
              'agregar' => 0,
              'editar' => 0,
              'ver' => 1,
              'inhabilitar' => 0,
              'borrar' => 0],


            [ 'idrol' => 3,
              'idmaestro' => 7,
              'agregar' => 0,
              'editar' => 0,
              'ver' => 0,
              'inhabilitar' => 0,
              'borrar' => 0],





          ]);
    }
}
