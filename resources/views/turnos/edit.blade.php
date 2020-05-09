@extends('layouts.app', ['activePage' => 'turnos', 'titlePage' => __('Turnos')])

@section('content')
<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">{{ __('Turno') }} {{ $turno->servicio->sigla }}{{ $turno->numero }}</h4>
              </div>
              <div class="card-body">

                @if (session('status'))
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('status') }}</span>
                      </div>
                    </div>
                  </div>
                @endif
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{ route('turnos') }}" class="btn btn-sm btn-primary">{{ __('Volver a la lista') }}</a>
                  </div>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <td><b>Fecha Solicitud</b></td>
                            <td>{{ $turno->fecha_solicitud }}</td>
                        </tr>
                        <tr>
                            <td><b>Fecha Atencion</b></td>
                            <td>{{ $turno->fecha_atencion }}</td>
                        </tr>
                        <tr>
                            <td><b>Fecha Cierre</b></td>
                            <td>{{ $turno->fecha_cierre }}</td>
                        </tr>
                        <tr>
                            <td><b>Servicio</b></td>
                            <td>{{ $turno->servicio->nombre }}</td>
                        </tr>
                        <tr>
                            <td><b>Turno N°</b></td>
                            <td>{{ $turno->servicio->sigla }}{{ $turno->numero }}</td>
                        </tr>
                    </table>
                </div>

                @if(!empty($turno->fecha_atencion) && empty($turno->fecha_cierre))
                <div class="row">
                  <div class="col-md-12">
                    <form action="{{ route('turnos.trasladar', $turno->id) }}" method="post">
                      @csrf
                      @method('put')
                      <div class="form-group{{ $errors->has('modulo_id') ? ' has-danger' : '' }}">
                        <label for="exampleFormControlSelect1">Seleccione un Modulo</label>
                        <select class="form-control{{ $errors->has('modulo_id') ? ' is-invalid' : '' }}" id="input-modulo_id" required="true" aria-required="true" name="modulo_id">
                          <option value="">--Seleccione un Modulo--</option>
                          @foreach($modulos as $modulo)
                            <option value="{{ $modulo->id }}">{{ $modulo->nombre }}</option>
                          @endforeach
                        </select>
                      </div>

                      <button type="submit" class="btn btn-info btn-custom">{{ __('Trasladar') }}</button>
                    </form>
                  </div>
                </div>
                @endif

                <div class="row">
                  <div class="col-sm-6 col-md-6">
                    <form action="{{ route('turnos.update', $turno) }}" method="post">
                      @csrf
                      @method('put')
                      @if(empty($turno->fecha_atencion))
                        <button type="submit" class="btn btn-success btn-custom">{{ __('Atender') }}</button>
                      @endif
                      @if(!empty($turno->fecha_atencion) && empty($turno->fecha_cierre))
                        <button type="submit" class="btn btn-warning btn-custom">{{ __('Finalizar') }}</button>
                      @endif
                    </form>
                  </div>
                  <div class="col-sm-6 col-md-6">
                    <form action="{{ route('turnos.noatendido', $turno->id) }}" method="post">
                      @csrf
                      @method('put')
                      @if(!empty($turno->fecha_atencion) && empty($turno->fecha_cierre))
                      <button type="button" class="btn btn-danger btn-custom" onclick="confirm('{{ __("¿Estás seguro de que deseas finalizar el turno?") }}') ? this.parentElement.submit() : ''">{{ __('No Atendido') }}</button>
                      @endif
                    </form>
                  </div>
                </div>

              </div>

            </div>
        </div>
      </div>
    </div>
</div>

<style>
.btn-custom {
  width:100%;
}
</style>
@endsection