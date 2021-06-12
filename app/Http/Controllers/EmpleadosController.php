<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;

class EmpleadosController extends Controller
{
    public function __construct(){
        $this->middleware(['auth']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleados = Empleado::all()->where('delete_state', 'ACTIVE');

        return view('empleado.index', ['empleados' => $empleados]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empleado = new Empleado();
        return view('empleado.create', [ 'empleado' => $empleado]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'correo' => 'required|email',
            'nombre' => 'required|string',
            'apellidoP' => 'required|string',
            'apellidoM' => 'required|string',
        ]);

        $empleado = new Empleado();

        $empleado->codigo = $request->codigo;
        $empleado->correo = $request->correo;
        $empleado->nombre = $request->nombre;
        $empleado->apellido_paterno = $request->apellidoP;
        $empleado->apellido_materno = $request->apellidoM;
        $empleado->tipo_contrato = $request->tipoContrato;
        
        if($empleado->save()){
            return redirect('/empleados');
        }

        return back();        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empleado = Empleado::find($id);

        return view('empleado.show', [ 'empleado' => $empleado]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empleado = Empleado::find($id);
        return view('empleado.update', [ 'empleado' => $empleado]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'correo' => 'required|email',
            'nombre' => 'required|string',
            'apellidoP' => 'required|string',
            'apellidoM' => 'required|string',
        ]);

        $empleado = Empleado::find($id);

        if($empleado){
            $empleado->codigo = $request->codigo;
            $empleado->correo = $request->correo;
            $empleado->nombre = $request->nombre;
            $empleado->apellido_paterno = $request->apellidoP;
            $empleado->apellido_materno = $request->apellidoM;
    
            if($empleado->save()){
                return view('empleado.index');
            }
        }     

        return back();      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empleado = Empleado::find($id);

        if($empleado->delete_state == 'ACTIVE'){
            $empleado->delete_state = 'INACTIVE';

            if($empleado->save()){
                return redirect('empleados');
            }          
        }
        
        return back();
    }

    public function estado($id){
        $empleado = Empleado::find($id);

        if($empleado->delete_state == 'ACTIVE'){
            if($empleado->estado == 'INACTIVE'){
                $empleado->estado = 'ACTIVE';
            }else if($empleado->estado == 'ACTIVE'){
                $empleado->estado = 'INACTIVE';
            }
            
            if($empleado->save()){
                return redirect('/empleados');
            } 
        }
        
        return back();       
    }
}
