<?php

namespace App\Model\Digiturno;

use Illuminate\Database\Eloquent\Model;

class ServicioCategoria extends Model
{   
    /**
    * Table name digi_servicio_categorias
    */
    protected $table = 'digi_servicio_categorias';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */    
    protected $fillable = ['nombre', 'descripcion', 'estado_id'];
}
