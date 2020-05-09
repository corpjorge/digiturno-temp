@extends('layouts.appTurnero')

@section('content')
<div class="container" style="height: auto;">
  <div class="row align-items-center">     
    <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">       
        <div class="card card-login card-hidden mb-3">
          <div class="card-header card-header-primary text-center">
            <h4 class="card-title"><strong>{{ __('Tu turno') }}</strong></h4>
          </div>
          <div class="card-body text-center">           
           <h1>{{$turno->servicio->sigla}} {{$turno->numero}} <h1>  
          </div>         
        </div>         
    </div>
  </div>
</div>
@endsection

@push('js')
<script>
  setTimeout(() => {
    window.location = "{{ route('turnero.create') }}";
  },60000); // 1 Minuto
</script>
@endpush