<?php

namespace App\Model\Digiturno;

use Illuminate\Database\Eloquent\Model;

class Modulo extends Model
{
    /**
     * Table name digi_modulos.
     */
    protected $table = 'digi_modulos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['estado_id', 'user_id', 'nombre'];

    /*
    * Relación hacia la tabla usuarios
    */
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
