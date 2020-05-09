@extends('layouts.appTurnero')

@section('content')
<div class="container" style="height: auto;">
  <div class="row align-items-center">     
    <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
      <form class="form" method="POST" action="{{ route('turnero') }}">
        @csrf
        <div class="card card-login card-hidden mb-3">
          <div class="card-header card-header-primary text-center">
            <h4 class="card-title"><strong>{{ __('TURNO') }}</strong></h4>
          </div>
          <div class="card-body">            
            <div class="input-group">             
                <input type="number" name="documento" id="documento" class="input form-control" placeholder="{{ __('Documento') }}" required style="font-size: 43px;" max="99999999999" />
            </div>
            <br> 
            <div class="simple-keyboard"></div>             
          </div>
          <div class="card-footer justify-content-center">
            <button type="submit" class="btn btn-primary btn-lg">{{ __('Ingresar') }}</button>
          </div>
        </div>
      </form>      
    </div>
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
