<?php

namespace App\Model\Digiturno;

use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{
    protected $table = 'digi_turnos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */    
    protected $fillable = ['user_id', 'servicio_id', 'modulo_id', 'numero', 'fecha_solicitud', 'fecha_atencion', 'fecha_cierre', 'estado'];

    /**
     * Get the servicio that owns the turno.
     */
    public function servicio()
    {
        return $this->belongsTo('App\Model\Digiturno\Servicio', 'servicio_id');
    }

    /**
     * Get the modulo that owns the turno.
     */

    public function modulo() 
    {
        return $this->belongsTo('App\Model\Digiturno\Modulo', 'modulo_id');
    }

    /**
     * Get the user that owns the turno.
     */
    public function usuario() 
    {
        return $this->belongsTo('App\User', 'user_id');
    }

}
