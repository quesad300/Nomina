@extends('layouts.app')

@section('content')

<center>
    <h1>Empleados</h1>
</center>

<div class="table container">
    <table>
        <thead>
            <td>Id</td>
            <td>código</td>
            <td>nombre</td>
            <td>apellido paterno</td>
            <td>apellido materno</td>
            <td>correo electrónico</td>    
            <td>tipo de contrato</td>
            <td>estado</td>
            <td>acciones</td>
        </thead>
        <tbody>
            @foreach($empleados as $empleado)
                <tr>
                <td>{{$empleado->id}}</td>
                    <td>{{ $empleado->codigo }}</td>
                    <td>{{ $empleado->nombre}}</td>
                    <td>{{ $empleado->apellido_paterno}}</td>
                    <td>{{ $empleado->apellido_materno}}</td>
                    <td>{{ $empleado->correo}}</td>
                    <td>{{ $empleado->tipo_contrato}}</td>
                    <td>{{ $empleado->estado }}</td>
                    <td><a href="{{url('/empleados/'.$empleado->id.'/edit')}}">
                    editar</a>
                    <a href="{{ url('/empleado/'.$empleado->id) }}">Activar/Desactivar</a>
                    @include('empleado.delete', ['empleado', $empleado])
                    <a href="{{url('/empleados/'.$empleado->id)}}">ver</a></td>
                </tr>
            @endforeach
        </tbody>    
    </table>
</div>

<div class="text-center">
    <a href="{{url('/empleados/create')}}" class="btn-primary btn-lg">Agregar Empleado</a>
</div>
@endsection