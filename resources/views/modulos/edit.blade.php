@extends('layouts.app', ['activePage' => 'modulos', 'titlePage' => __('Modulos')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('modulos.update', $modulo) }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('put')

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Editar modulos') }}</h4>
                <p class="card-category"></p>
              </div>
              <div class="card-body ">
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{ route('modulos') }}" class="btn btn-sm btn-primary">{{ __('Volver a la lista') }}</a>
                  </div>
                </div>
                  <div class="row">
                      <label class="col-sm-2 col-form-label">{{ __('Usuarios') }}</label>
                      <div class="col-sm-7">
                          <div class="form-group{{ $errors->has('user_id') ? ' has-danger' : '' }}">
                              <select class="form-control{{ $errors->has('user_id') ? ' is-invalid' : '' }}" id="input-user_id" required="true" aria-required="true" name="user_id">
                                  <option value="{{ old('user_id', $modulo->user->id) }}">{{ $modulo->user->name }}</option>
                                  @foreach ($users as $user)
                                      <option value="{{ $user->id }}">{{ $user->name }}</option>
                                  @endforeach
                              </select>
                              @if ($errors->has('user_id'))
                                  <span id="user_id-error" class="error text-danger" for="input-user_id">{{ $errors->first('user_id') }}</span>
                              @endif
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <label class="col-sm-2 col-form-label">{{ __('Nombre') }}</label>
                      <div class="col-sm-7">
                          <div class="form-group{{ $errors->has('nombre') ? ' has-danger' : '' }}">
                              <input class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" id="input-nombre" type="text" placeholder="{{ __('Nombre') }}" value="{{ old('nombre', $modulo->nombre) }}" required="true" aria-required="true"/>
                              @if ($errors->has('nombre'))
                                  <span id="nombre-error" class="error text-danger" for="input-nombre">{{ $errors->first('nombre') }}</span>
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
                          <input name="estado_id" type="checkbox" {{ $modulo->estado_id == 1 ? ' checked' : '' }}  value="{{ old('estado_id', 1) }}">
                          <span class="toggle"></span>
                        </label>
                      </div>
                      @if ($errors->has('estado_id'))
                      <span id="estado_id-error" class="error text-danger" for="input-estado_id">{{ $errors->first('estado_id') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
