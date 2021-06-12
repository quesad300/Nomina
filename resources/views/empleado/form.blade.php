<form method="POST" action="{{ url($url)}}" class="inline-block">
    @csrf
    @method($method) 
    <div class="row justify-content-center">
        <div class="form-group">
            <label for="codigo">{{ __('Código:')}}</label>
            <div>
                <input type="text" name="codigo" id="codigo">
            </div>            
        </div>
    </div>
    <div class="row justify-content-center">     
        <div class="form-group">
            <label for="nombre">{{ __('Nombre:')}}</label>
            <div>
                <input value="{{old('nombre')==null ? $empleado->nombre:old('nombre')}}" type="text" class="from-control @error('nombre') is-invalid @enderror" name="nombre" id="nombre">
            </div>
            @error('nombre')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="row justify-content-center">    
        <div class="form-group">
            <label for="correo">{{ __('Correo:')}}</label>
            <div>
                <input value="{{old('correo')==null ? $empleado->correo:old('correo')}}" type="text" name="correo" id="correo">
            </div>
            @error('correo')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="row justify-content-center">    
        <div class="form-group">
            <label for="tipoContrato">{{ __('Tipo Contrato:')}}</label>
            <div>
                <input value="{{old('tipoContrato')==null ? $empleado->tipo_contrato:old('tipoContrato')}}" type="text" name="tipoContrato" id="tipoContrato">
            </div>
            @error('tipoContacto')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>    
    <div class="row justify-content-center">
        <div class="form-group">
            <label for="apellidoP">{{ __('Apellido paterno:')}}</label>
            <div>
                <input type="text" name="apellidoP" id="apellidoP">
            </div>
            @error('apellidoP')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="row justify-content-center">    
        <div class="form-group">
            <label for="apellidoM">{{ __('Apellido materno:')}}</label>
            <div>
                <input type="text" name="apellidoM" id="apellidoM">
            </div>
            @error('apellidoM')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>       
    </div>
    <div class="row justify-content-center">
        <div class="form-group float-center">
            <input type="submit" value="Crear Empleado" class="btn-primary btn-success">
        </div>
    </div>    
</form>