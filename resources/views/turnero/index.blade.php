@extends('layouts.appTurnero')

@section('content')
<div class="content">     
    <div id="app">
        <turnero-component></turnero-component>
    </div>
</div> 

<style>
.content {
    width:90%;
    margin:auto;
}
</style>

@endsection

@push('js')
<!-- Vue js -->
<script src="{{ asset('js/app.js') }}"></script> 
@endpush