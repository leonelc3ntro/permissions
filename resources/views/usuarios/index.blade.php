@extends('layouts.ajax')

@section('content')
    <div class="container">
      @include('usuarios.table')
      @include('usuarios.form')
    </div>

	@include('partials.libraries')	
    <script src="{{asset('js/usuarios.js')}}"></script>
@endsection
