@extends('layouts.app', ['activePage' => 'publicidad', 'titlePage' => __('Publicidad')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('publicidad.store') }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            @method('post')

            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Agregar publicidad') }}</h4>
                <p class="card-category"></p>
              </div>
              <div class="card-body ">
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{ route('publicidad') }}" class="btn btn-sm btn-primary">{{ __('Volver a la lista') }}</a>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Fecha de Cierre') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('fecha_cierre') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('fecha_cierre') ? ' is-invalid' : '' }}" name="fecha_cierre" id="input-fecha_cierre" type="datetime-local" placeholder="{{ __('fecha_cierre') }}" value="{{ old('fecha_cierre') }}" required="true" aria-required="true"/>
                      @if ($errors->has('fecha_cierre'))
                        <span id="fecha_cierre-error" class="error text-danger" for="input-fecha_cierre">{{ $errors->first('fecha_cierre') }}</span>
                      @endif
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Titulo') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('titulo') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('titulo') ? ' is-invalid' : '' }}" name="titulo" id="input-titulo" type="text" placeholder="{{ __('titulo') }}" value="{{ old('titulo') }}" required="true" aria-required="true"/>
                      @if ($errors->has('titulo'))
                        <span id="titulo-error" class="error text-danger" for="input-titulo">{{ $errors->first('titulo') }}</span>
                      @endif
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Descripción') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('Descripcion') ? ' has-danger' : '' }}">                      
                      <textarea class="form-control{{ $errors->has('Descripcion') ? ' is-invalid' : '' }}" name="Descripcion" id="input-Descripcion" rows="3" required="true" aria-required="true">{{ old('Descripcion') }}</textarea> 
                      @if ($errors->has('Descripcion'))
                        <span id="Descripcion-error" class="error text-danger" for="input-Descripcion">{{ $errors->first('Descripcion') }}</span>
                      @endif
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Estado') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('estado_id') ? ' has-danger' : '' }}">
                      <div class="togglebutton">
                        <label>
                          <input name="estado_id" type="checkbox" checked="" value="{{ old('estado_id', 1) }}">
                          <span class="toggle"></span>
                        </label>
                      </div>
                      @if ($errors->has('estado_id'))
                      <span id="estado_id-error" class="error text-danger" for="input-estado_id">{{ $errors->first('estado_id') }}</span>
                      @endif
                    </div>
                  </div>
                </div>

                <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Imagen/Video') }}</label>
                    <div class="col-sm-7">
                        <input type="file" class="form-control{{ $errors->has('img') ? ' is-invalid' : '' }}" name="img" id="img">
                    </div>
                </div>

              </div>

              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Agregar publicidad') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection