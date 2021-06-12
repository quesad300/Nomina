@extends('layouts.app')

@section('content')

    <div class="container">
        <center>Editar Empleado</center>
        @include('empleado.form', ['empleado' => $empleado, 'url' => '/empleados/'.$empleado->id, 'method' => 'PUT'])
    </div>

@endsection