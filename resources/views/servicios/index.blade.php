@extends('layouts.app', ['activePage' => 'servicios', 'titlePage' => __('Servicios')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">{{ __('Servicios') }}</h4>
                <p class="card-category"> {{ __('Aquí puedes administrar los servicios') }}</p>
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
                  <div class="col-12 text-right">
                    <a href="{{ route('servicios.create') }}" class="btn btn-sm btn-primary">{{ __('Agregar servicios') }}</a>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                        {{ __('Nombre') }}
                      </th>                       
                      <th>
                        {{ __('Fecha de creación') }}
                      </th>
                      <th class="text-right">
                        {{ __('Acción') }}
                      </th>
                    </thead>
                    <tbody>
                      @foreach($servicios as $servicio)
                        <tr>
                          <td>
                            {{ $servicio->nombre }}
                          </td>                          
                          <td>
                            {{ $servicio->created_at->format('Y-m-d') }}
                          </td>
                          <td class="td-actions text-right">                            
                              <form action="{{ route('servicios.destroy', $servicio) }}" method="post">
                                  @csrf
                                  @method('delete')
                              
                                  <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('servicios.edit', $servicio) }}" data-original-title="" title="">
                                    <i class="material-icons">edit</i>
                                    <div class="ripple-container"></div>
                                  </a>
                                  <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("¿Estás seguro de que deseas eliminar este servicio?") }}') ? this.parentElement.submit() : ''">
                                      <i class="material-icons">close</i>
                                      <div class="ripple-container"></div>
                                  </button>
                              </form>
                             
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