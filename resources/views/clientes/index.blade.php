@extends('layouts.ajax')

@section('content')
    <div class="container">
      @include('clientes.table')
      @include('clientes.form')
    </div>

    @include('partials.libraries')

    <script src="{{asset('js/clientes.js')}}"></script>
@endsection
