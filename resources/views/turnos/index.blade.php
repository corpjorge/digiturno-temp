@extends('layouts.app', ['activePage' => 'turnos', 'titlePage' => __('Turnos')])

@section('content')
<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">{{ __('Turnos') }}</h4>
                <p class="card-category"> {{ __('Aquí puedes administrar los turnos') }}</p>
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
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                        {{ __('Fecha Solicitud') }}
                      </th>
                      <th>
                        {{ __('Fecha Atencion') }}
                      </th>
                      <th>
                        {{ __('Fecha Cierre') }}
                      </th>
                      <th>
                        {{ __('Servicio') }}
                      </th>
                      <th>
                        {{ __('Numero') }}
                      </th>
                      <th>
                        {{ __('Prioridad') }}
                      </th>
                      <th>
                        {{ __('Estado') }}
                      </th>
                      <th class="text-right">
                        {{ __('Acción') }}
                      </th>
                    </thead>
                    <tbody>
                      @foreach($turnos as $turno)
                        <tr>
                          <td>
                            {{ $turno->fecha_solicitud }}
                          </td>
                          <td>
                            {{ $turno->fecha_atencion ? $turno->fecha_atencion : 'Pendiente' }}
                          </td>
                          <td>
                            {{ $turno->fecha_cierre ? $turno->fecha_cierre : 'Pendiente' }}
                          </td>
                          <td>
                            {{ $turno->servicio->nombre }}
                          </td>
                          <td>
                            {{ $turno->servicio->sigla }}{{ $turno->numero }}
                          </td>
                          <td>
                            <span class="badge badge-{{ $turno->servicio->prioridad_id == '1' ? 'danger' : '' }}">{{ $turno->servicio->prioridad->prioridad }}</span>
                          </td>
                          <td>
                            {{ $turno->estado ? $turno->estado : 'Solicitado' }}
                          </td>
                          <td class="td-actions text-right">
                            <a rel="tooltip" class="btn btn-default btn-link" href="{{ route('turnos.edit', $turno) }}" data-original-title="" title="">
                                <i class="material-icons">done</i>
                                <div class="ripple-container"></div>
                            </a>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
</div>
@endsection
