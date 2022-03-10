<?php

namespace App\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'telefono','contacto_emergencia' ,'fecha_contrato' ,'fecha_despido', 'images','nombre','apellido','idrole', 'email', 'password','active', 'apellido', 'domicilio',  'fecha_nacimiento','sueldo',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function role()
    {

        return $this->belongsTo('App\Model\Role','idrole','id');
    }

}
