@extends('layouts.app', ['activePage' => 'servicios', 'titlePage' => __('Servicios')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('servicios.store') }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('post')

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Agregar servicio') }}</h4>
                <p class="card-category"></p>
              </div>
              <div class="card-body ">
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{ route('servicios') }}" class="btn btn-sm btn-primary">{{ __('Volver a la lista') }}</a>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Categoría') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('categoria_id') ? ' has-danger' : '' }}">
                      <select class="form-control{{ $errors->has('categoria_id') ? ' is-invalid' : '' }}" id="input-categoria_id" required="true" aria-required="true" name="categoria_id">
                        <option value="{{ old('categoria_id') }}">Seleccionar</option>
                        @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                        @endforeach
                      </select>
                      @if ($errors->has('categoria_id'))
                        <span id="categoria_id-error" class="error text-danger" for="input-categoria_id">{{ $errors->first('categoria_id') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Prioridades') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('prioridad_id') ? ' has-danger' : '' }}">
                      <select class="form-control{{ $errors->has('prioridad_id') ? ' is-invalid' : '' }}" id="input-prioridad_id" required="true" aria-required="true" name="prioridad_id">
                        <option value="{{ old('prioridad_id') }}">Seleccionar</option>
                        @foreach ($prioridades as $prioridad)
                        <option value="{{ $prioridad->id }}">{{ $prioridad->prioridad }}</option>
                        @endforeach
                      </select>
                      @if ($errors->has('prioridad_id'))
                        <span id="prioridad_id-error" class="error text-danger" for="input-prioridad_id">{{ $errors->first('prioridad_id') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Nombre') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('nombre') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" id="input-nombre" type="text" placeholder="{{ __('Nombre') }}" value="{{ old('nombre') }}" required="true" aria-required="true"/>
                      @if ($errors->has('nombre'))
                        <span id="nombre-error" class="error text-danger" for="input-nombre">{{ $errors->first('nombre') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Sigla') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('sigla') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('sigla') ? ' is-invalid' : '' }}" name="sigla" id="input-sigla" type="text" placeholder="{{ __('sigla') }}" value="{{ old('sigla') }}" required="true" aria-required="true"/>
                      @if ($errors->has('sigla'))
                        <span id="sigla-error" class="error text-danger" for="input-sigla">{{ $errors->first('sigla') }}</span>
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
              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Agregar servicio') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
