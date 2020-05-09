<?php

namespace App\Http\Controllers\Digiturno;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Digiturno\ServicioCategoria;
use App\Http\Requests\ServicioCategoriaRequest;

class ServicioCategoriaController extends Controller
{
    /**
     * Display a listing of the ServicioCategoria.
     *
     * @param  \App\Model\Digiturno\ServicioCategoria  $model
     * @return \Illuminate\Http\Response
     */
    public function index(ServicioCategoria $model)
    {
        return view('categorias.index', ['categorias' => $model->paginate(15)]);
    }

    /**
     * Show the form for creating a new categorias.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categorias.create');
    }

    /**
     * Store a newly created categoria in storage.
     *
     * @param  \App\Http\Requests\ServicioCategoriaRequest  $request
     * @param  \App\Model\Digiturno\ServicioCategoria  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ServicioCategoriaRequest $request, ServicioCategoria $model)
    {
        $model->create($request->all());
        return redirect()->route('categorias')->withStatus(__('Categoría creado con éxito.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\ServicioCategoria  $servicioCategoria
     * @return \Illuminate\Http\Response
     */
    public function show(ServicioCategoria $servicioCategoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\ServicioCategoria  $servicioCategoria
     * @return \Illuminate\Http\Response
     */
    public function edit(ServicioCategoria $categoria)
    {
        return view('categorias.edit', compact('categoria'));
    }

    /**
     * Update the specified categoria in storage.
     *
     * @param  \App\Http\Requests\ServicioCategoriaRequest  $request
     * @param  \App\Model\Digiturno\ServicioCategoria  $servicioCategoria
     * @return \Illuminate\Http\Response
     */
    public function update(ServicioCategoriaRequest $request, ServicioCategoria $categoria)
    {
        if(!$request->estado_id){
            $request->request->add(['estado_id' => 2]);
        }  
        $categoria->update($request->all()); 
        return redirect()->route('categorias')->withStatus(__('Categoría actualizada con éxito.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\ServicioCategoria  $servicioCategoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServicioCategoria $servicioCategoria)
    {
        //
    }
}
