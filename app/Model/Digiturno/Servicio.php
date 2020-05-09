<?php

namespace App\Model\Digiturno;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    /**
    * Table name digi_servicios.
    */
    protected $table = 'digi_servicios';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['categoria_id', 'prioridad_id', 'estado_id', 'nombre', 'sigla'];


    /*
    * Relación hacia la tabla categoría
    */
    public function categoria()
    {
        return $this->belongsTo('App\Model\Digiturno\ServicioCategoria','categoria_id');
    }

    /*
    * Relación hacia la tabla prioridad
    */
    public function prioridad()
    {
        return $this->belongsTo('App\Prioridades','prioridad_id');
    }
}
