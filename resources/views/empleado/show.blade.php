@extends('layouts.app')

@section('content')
    <div class="container text-center">
        @include('empleado.empleado', ['empleado' => $empleado])
    </div>
@endsection