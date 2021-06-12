<form method="POST" action="{{ url('/empleados/'.$empleado->id)}}">
    @csrf
    @method('DELETE')
    <input type="submit" name="" class="btn btn-danger" value="Eliminar">
</form>