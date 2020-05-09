<?php

namespace App\Http\Controllers\Digiturno;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Model\Digiturno\Turno;
use App\Model\Digiturno\Modulo;
use App\Model\Digiturno\Servicio;
use App\Model\Publicidad;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Model\Digiturno\ServicioCategoria;

class TurneroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('turnero.index');
    }

    //Funcion para obtener las publicidades
    public function getPublicidad(Request $request, Publicidad $publicidad) {
        $response = Publicidad::inRandomOrder()->limit(1)->get();
        if (!empty($response)) {
            return response()->json($response);
        } else {
            
        }
    }

    //Funcion para obtener los turnos
    public function getTurnos(Request $request, Turno $turnos) {
        $response = Turno::with('servicio','usuario')->whereNotNull('digi_turnos.fecha_atencion')->whereNull('digi_turnos.fecha_cierre')->take(8)->get();
        return response()->json($response);
    }

    /**
     * Show the form for creating a new Turno.
     *  
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('turnero.create');
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\ServicioCategoria  $categorias
     */
    public function store(Request $request, ServicioCategoria $categorias)
    {      
        $user = User::where('documento',$request->documento)->first();
        if (empty($user)) { 
            $user = User::create([
                'rol_id' => 7,
                'estado_id' => 1,
                'name' => $request->documento,
                'email' => $request->documento,
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make($request->documento),
                'documento' => $request->documento,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
            return view('turnero.categoria', compact('user'), ['categorias' => $categorias->where('estado_id',1)->get()]);
        } else {
            //Obtener id del usuario.
            $user_id = $user->id;
            //Consultamos si el usuario tiene un turno pendiente
            $turno = Turno::where('user_id', $user_id)->whereNull('fecha_cierre')->first();
            if (empty($turno)) { //Si no tiene turnos pendientes
                return view('turnero.categoria', compact('user'), ['categorias' => $categorias->where('estado_id',1)->get()]); //Retornamos la vista categoria
            } else { //Si no
                return redirect()->route('turnero.create');
            }
        }
    }

    /**
     * Show the form for creating a new Turno.
     *
     * @param  \App\Model\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function servicio(Request $request, Servicio $servicios)
    {
       $nombre = $request->nombre;
       $user = $request->user;
       $categoria = $request->categoria;
       return view('turnero.servicio', compact('user','nombre'), ['servicios' => $servicios->where('estado_id',1)->get()]); 
    } 

    /**
     * Store a newly created resource in storage.
     * 
     * @param  \App\Model\Modulo  $modulo
     * @return \Illuminate\Http\Response
     * @param  \Illuminate\Http\Request  $request 
     */
    public function createTurno(Request $request)
    {        
        $turnoNum = Turno::orderBy('id', 'DESC')->first();
        if(!$turnoNum){
            $numero=1;
        }
        else if($turnoNum->numero == 99){
            $numero=1;
        }
        else{
            $numero=$turnoNum->numero+1;
        }        
        $turno = new Turno();
        $turno->user_id = $request->user;      
        $turno->servicio_id = $request->servicio; 
        $turno->numero = $numero;     
        $turno->fecha_solicitud = Carbon::now();
        $turno->save();
        return redirect()->route('turnero.show', $turno);         
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Digiturno\Turno $turno     
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $turno = Turno::find($id);
        return view('turnero.show', compact('turno'));       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Turno $turno  
     * @return \Illuminate\Http\Response
     */
    public function edit(Turno $turno)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
