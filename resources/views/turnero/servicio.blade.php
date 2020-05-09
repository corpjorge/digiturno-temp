@extends('layouts.appTurnero')

@section('content')
<div class="container" style="height: auto;">
  <div class="row align-items-center"> 
    <div class="col-md-9 ml-auto mr-auto mb-3 text-center">
      <h3>{{ $nombre }} </h3>
    </div>
    @foreach ($servicios as $servicio)    
    <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
      <form class="form" method="POST" action="{{ route('turnero.crear') }}">
        <input type="hidden" name="user" value="{{$user}}"> 
        <input type="hidden" name="servicio" value="{{$servicio->id}}"> 
        @csrf        
        <div class="card card-login card-hidden mb-3">
          <button type="submit" class="card-header card-header-primary text-center btn">
            <h4 class="card-title"><strong>{{ $servicio->nombre }}</strong></h4>
          </button>  
          <div class="card-footer justify-content-center">
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
