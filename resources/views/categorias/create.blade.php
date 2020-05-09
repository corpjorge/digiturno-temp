@extends('layouts.app', ['activePage' => 'categorias', 'titlePage' => __('Categorías')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('categorias.store') }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('post')

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Agregar categoría') }}</h4>
                <p class="card-category"></p>
              </div>
              <div class="card-body ">
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{ route('categorias') }}" class="btn btn-sm btn-primary">{{ __('Volver a la lista') }}</a>
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
                  <label class="col-sm-2 col-form-label">{{ __('Descripción') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('descripcion') ? ' has-danger' : '' }}">                      
                      <textarea class="form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }}" name="descripcion" id="input-descripcion" rows="3" required="true" aria-required="true">{{ old('descripcion') }}</textarea> 
                      @if ($errors->has('descripcion'))
                        <span id="descripcion-error" class="error text-danger" for="input-descripcion">{{ $errors->first('descripcion') }}</span>
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
                <button type="submit" class="btn btn-primary">{{ __('Agregar Categoría') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection