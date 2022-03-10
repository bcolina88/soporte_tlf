<?php
use App\Model\User;

use Illuminate\Database\Seeder;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       User::create([
       'nombre' => 'Admin',
       'apellido' => 'Admin',
       'idrole'  => 1,
       'active'  => true,
       'email' => 'admin@admin.com',
       'password' => bcrypt('secret'),
       'domicilio' => '',
       'fecha_nacimiento'=> '',
       'telefono'=> '',
       'sueldo'=> 0,
       'contacto_emergencia' => '',
       'fecha_contrato'=> '',
       'fecha_despido'=> '',
       'images'=> '',


       ]);


 

        $user = factory(App\Model\User::class, 48)->create([
          'idrole' =>function() {
            return App\Model\Role::inRandomOrder()->first()->id;
          },
         'password' => bcrypt('secret'),
         'fecha_nacimiento'=> '',
         'fecha_contrato'=> '',
         'fecha_despido'=> '',
         'images'=> '',

        ]);


      

    }
}
