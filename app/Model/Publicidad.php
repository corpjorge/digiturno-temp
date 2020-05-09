<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Publicidad extends Model
{
    protected $table = 'digi_publicidad';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['estado_id', 'fecha_cierre', 'titulo', 'img', 'Descripcion'];

}
