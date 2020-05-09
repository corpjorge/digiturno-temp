<?php

namespace App\Http\Controllers;

use App\Model\Publicidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PublicidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Publicidad $model)
    {
        return view('publicidad.index', ['publicidades' => $model->paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('publicidad.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Publicidad $model)
    {
        if ($request->hasFile('img')) {
            $data = $request->all();
            $data['img'] = $request->file('img')->store('publicidad', ['disk' => 'public']);
            $model->create($data);
            return redirect()->route('publicidad')->withStatus(__('Publicidad creado con éxito.'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Publicidad  $publicidad
     * @return \Illuminate\Http\Response
     */
    public function show(Publicidad $publicidad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Publicidad  $publicidad
     * @return \Illuminate\Http\Response
     */
    public function edit(Publicidad $publicidad)
    {
        return view('publicidad.edit', compact('publicidad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Publicidad  $publicidad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Publicidad $publicidad)
    {
        if($request->hasFile('img')) {
            //Consultamos en la base de datos la publicidad a editar
            $model = Publicidad::find($publicidad->id);
            //Eliminamos el archivo video o imagen
            Storage::disk('public')->delete($model->img);
            //Validamos el estado
            if(!$request->estado_id){
                $request->request->add(['estado_id' => 2]);
            }
            //Almacenamos en una variable los request
            $data = $request->all();
            //Modificamos la ruta 
            $data['img'] = $request->file('img')->store('publicidad', ['disk' => 'public']);
            //Actualizamos los datos
            $model->update($data);
            return redirect()->route('publicidad')->withStatus(__('Publicidad actualizado con éxito.'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Publicidad  $publicidad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Publicidad $publicidad)
    {
        $model = Publicidad::find($publicidad->id);
        Storage::disk('public')->delete($model->img);
        $model->delete();
        return redirect()->route('publicidad')->withStatus(__('Publicidad eliminado con éxito.'));
    }
}
