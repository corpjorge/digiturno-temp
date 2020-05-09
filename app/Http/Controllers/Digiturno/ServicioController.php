<?php

namespace App\Http\Controllers\Digiturno;

use App\Prioridades;
use Illuminate\Http\Request;
use App\Model\Digiturno\Servicio;
use App\Http\Controllers\Controller;
use App\Http\Requests\ServicioRequest;
use App\Model\Digiturno\ServicioCategoria;

class ServicioController extends Controller
{
    /**
     * Display a listing of the Servicios.
     *
     * @param  \App\Model\Digiturno\Servicio  $model
     * @return \Illuminate\Http\Response
     */
    public function index(Servicio $model)
    {
        return view('servicios.index', ['servicios' => $model->paginate(15)]);
    }

    /**
     * Show the form for creating a new servicio.
     * 
     * @param  \App\Model\ServicioCategoria  $categorias
     * @param  \App\Prioridades  $prioridades
     * @return \Illuminate\Http\Response
     */
    public function create(ServicioCategoria $categorias, Prioridades $prioridades)
    {
        return view('servicios.create', ['categorias' => $categorias->all(), 'prioridades' => $prioridades->all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ServicioRequest  $request
     * @param  \App\Model\Digiturno\Servicio  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ServicioRequest $request, Servicio $model)
    {
        $model->create($request->all());
        return redirect()->route('servicios')->withStatus(__('Servicio creado con éxito.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function show(Servicio $servicio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Servicio $servicio
     * @return \Illuminate\Http\Response
     */
    public function edit(Servicio $servicio, ServicioCategoria $categorias, Prioridades $prioridades)
    {
        return view('servicios.edit', compact('servicio'), ['categorias' => $categorias->all(), 'prioridades' => $prioridades->all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ServicioRequest  $request
     * @param  \App\Model\Digiturno\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function update(ServicioRequest $request, Servicio $servicio)
    {
        if(!$request->estado_id){
            $request->request->add(['estado_id' => 2]);
        }                    
        $servicio->update($request->all());         
        return redirect()->route('servicios')->withStatus(__('Servicio actualizado con éxito.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Servicio $servicio)
    {
        //
    }
}
