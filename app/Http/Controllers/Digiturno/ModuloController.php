<?php

namespace App\Http\Controllers\Digiturno;

use App\User;
use App\Http\Requests\ModuloRequest;
use App\Http\Controllers\Controller;
use App\Model\Digiturno\Modulo;
use Illuminate\Http\Request;


class ModuloController extends Controller
{
    /**
     * Display a listing of the modulos.
     *
     * @param  \App\Model\Digiturno\Modulo  $model
     * @return \Illuminate\Http\Response
     */
    public function index(Modulo  $model)
    {
        return view('modulos.index', ['modulos' => $model->paginate(15)]);
    }

    /**
     * Show the form for creating a new modulo.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $users)
    {
        return view('modulos.create', ['users' => $users->all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ModuloRequest  $request
     * @param  \App\Model\Digiturno\Modulo $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ModuloRequest $request, Modulo $model)
    {
        $model->create($request->all());
        return redirect()->route('modulos')->withStatus(__('Modulo creado con éxito.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Digiturno\Modulo  $modulo
     * @return \Illuminate\Http\Response
     */
    public function show(Modulo $modulo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Digiturno\Modulo $modulo
     * @return \Illuminate\Http\Response
     */
    public function edit(Modulo $modulo, User $users)
    {
        return view('modulos.edit', compact('modulo'), ['users' => $users->all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\ModuloRequest $request
     * @param  \App\Model\Digiturno\Modulo $modulo
     * @return \Illuminate\Http\Response
     */
    public function update(ModuloRequest $request, Modulo $modulo)
    {
        if(!$request->estado_id){
            $request->request->add(['estado_id' => 2]);
        }
        $modulo->update($request->all());
        return redirect()->route('modulos')->withStatus(__('Modulo actualizado con éxito.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Digiturno\Modulo  $modulo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Modulo $modulo)
    {
        //
    }
}
