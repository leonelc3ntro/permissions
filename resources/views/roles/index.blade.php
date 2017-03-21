@extends('layouts.ajax')

@section('content')
    <div class="container">
      @include('roles.table')
      @include('roles.form')
    </div>

    @include('partials.libraries')

    <script src="{{asset('js/roles.js')}}"></script>
@endsection
