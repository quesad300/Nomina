@extends('layouts.app')

@section('content')

    <div class="container">
        <center>Nuevo Empleado</center>
        @include('empleado.form', ['empleado' => $empleado, 'url' => '/empleados', 'method' => 'POST'])
    </div>

@endsection