@extends('layouts.appTurnero')

@section('content')
<div class="container" style="height: auto;">
  <div class="row align-items-center"> 
    <div class="col-md-9 ml-auto mr-auto mb-3 text-center">
      <h3>{{ $user->name }} </h3>
    </div>
    @foreach ($categorias as $categoria)    
    <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
      <form class="form" method="POST" action="{{ route('turnero.servicio') }}">
        <input type="hidden" name="nombre" value="{{$user->name}}"> 
        <input type="hidden" name="user" value="{{$user->id}}"> 
        <input type="hidden" name="categoria" value="{{$categoria->id}}"> 
        @csrf        
        <div class="card card-login card-hidden mb-3">
          <div class="card-header card-header-primary text-center">
            <h4 class="card-title"><strong>{{ $categoria->nombre }}</strong></h4>
          </div>          
          <div class="card-body">{{ $categoria->descripcion }}</div>
          <div class="card-footer justify-content-center">
            <button type="submit" class="btn btn-primary btn-lg">{{ __('Ingresar') }}</button>
          </div>          
        </div>        
      </form>      
    </div>
    @endforeach
  </div>
</div>

<style>

#documento::-webkit-input-placeholder {  
  font-size: 40px;
}
#documento::-moz-placeholder {  
  font-size: 40px;
}
#documento::-ms-input-placeholder {  
  font-size: 40px;
}
#documento::placeholder {  
  font-size: 40px;
}
</style>  


@endsection
