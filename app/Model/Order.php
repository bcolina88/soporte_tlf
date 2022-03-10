<?php

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
 

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'fechacreacion' ,'idcliente','marca','modelo', 'serie','lapiz',
        'garantia','clavebloqueo', 'diagnostico', 'valor', 'detalle', 'bateria' ,'tapa', 'memoria' ,'sim' ,'idatendidopor', 'estado', 
    ];



    public function atendidopor()
    {

        return $this->belongsTo('App\Model\User','idatendidopor','id');
    }

    public function cliente()
    {

        return $this->belongsTo('App\Model\User','idcliente','id');
    }

}
