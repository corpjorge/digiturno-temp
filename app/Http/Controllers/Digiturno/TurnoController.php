<?php

namespace App\Http\Controllers\Digiturno;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Model\Digiturno\Turno;
use App\Model\Digiturno\Servicio;
use App\Model\Digiturno\Modulo;
use Illuminate\Http\Request;

class TurnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Turno $model)
    {   
        //Validamos si el rol del Usuario o Asesor es Super Admin o Admin
        if(auth()->user()->rol_id <= 1) {
            //Si cumple, entonces mostramos todos los turnos
            return view('turnos.index', ['turnos' => Turno::with('servicio')->get()]);
        } else {
            //Consulto el modulo correspondiente al Usuario o Asesor
            $modulo = Modulo::where('user_id', auth()->user()->id)->first();
            //Si el Usuario o Asesor no tiene un modulo asignado
            if(empty($modulo)) {
                //Retornamos a la vista de turnos pero, sin lo turnos.
                return view('turnos.index', ['turnos' => []]);
            } else { //Si no
                //Retornamos la vista de turnos.
                return view('turnos.index', ['turnos' => Turno::with('servicio')->where('modulo_id', $modulo->id)->whereNull('fecha_cierre')->orWhereNull('fecha_atencion')->get()]);
            }        
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Digiturno\Turno  $turno
     * @return \Illuminate\Http\Response
     */
    public function show(Turno $turno)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Digiturno\Turno  $turno
     * @return \Illuminate\Http\Response
     */
    public function edit(Turno $turno)
    {   
        return view('turnos.edit',  compact('turno'), ['turno' => Turno::with('servicio', 'modulo')->where('id', $turno->id)->get(), 'modulos' => Modulo::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Digiturno\Turno  $id turno
     * @return \Illuminate\Http\Response
     */

    public function trasladar(Request $request, $id) 
    {
        //Consultamos el turno a Cancelar
        $turno = Turno::where('id', $id)->first();
        //Validamos
        if ($this->validarTurno($turno)) {
            $turno->fecha_cierre = Carbon::now();
            $turno->estado = 'Trasladado';
            $turno->update();

            //Se crea otro registro
            Turno::create([
                'user_id' => $turno->user_id,
                'servicio_id' => $turno->servicio_id,
                'modulo_id' => $request->modulo_id,
                'numero' => $turno->numero,
                'fecha_solicitud' => $turno->fecha_solicitud,
                'fecha_atencion' => $turno->fecha_atencion,
                'estado' => $turno->estado
            ]);
            //Retornamos a la vista de turnos
            return redirect()->route('turnos')->withStatus(__('El turno ha sido trasladado'));

        } else {
            return redirect()->route('turnos')->withStatus(__('El turno se encuentra ocupado'));
        }
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \App\Model\Digiturno\Turno  $id
     * @return \Illuminate\Http\Response
     */

    public function noatendido($id) 
    {
        //Consultamos el turno a Cancelar
        $turno = Turno::where('id', $id)->first();
        //Validamos
        if ($this->validarTurno($turno)) {
            $turno->fecha_cierre = Carbon::now();
            $turno->estado = 'Cancelado';
            $turno->update();
            return redirect()->route('turnos')->withStatus(__('El turno ha sido cancelado'));
        } else {
            return redirect()->route('turnos')->withStatus(__('El turno se encuentra ocupado'));
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Digiturno\Turno  $turno
     * @return \Illuminate\Http\Response
     */
    public function update(Turno $turno)
    {   
        if ($this->validarTurno($turno)) {
            //Validamos las fechas
            if (empty($turno->fecha_atencion)) {
                $turno->fecha_atencion = Carbon::now();
                $turno->estado = 'Atendido';
            } else {
                $turno->fecha_cierre = Carbon::now();
                $turno->estado = 'Finalizado';
            }
            //Actualizamos
            $turno->update();
            //Regresamos a la vista
            return redirect()->back();
        } else {
            return redirect()->route('turnos')->withStatus(__('El turno se encuentra ocupado'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Digiturno\Turno  $turno
     * @return \Illuminate\Http\Response
     */
    public function destroy(Turno $turno)
    {
        //
    }

    /**
     * Validar el turno
     * 
     * @param $turno
     * @return boolean
     */

    public function validarTurno($turno) 
    {
        //Consultamos el modulo del Usuario o Asesor
        $modulo = Modulo::where('user_id', auth()->user()->id)->first();
        //Validamos si el Usuario o Asesor tiene o no un modulo o area de trabajo asignado
        if (empty($modulo)) {
            return false;
        } else {
            //Validamos si el turno no tiene modulo o si es igual al modulo del usuario asignado
            if (empty($turno->modulo_id) || $turno->modulo_id == $modulo->id) {
                //Asignamos el modulo al turno
                $turno->modulo_id = $modulo->id;
                //actualizamos el registro
                $turno->update();
                //Es verdadero
                return true;
            } else {
                //Es falso 
                return false;
            }
        }
    }

}
