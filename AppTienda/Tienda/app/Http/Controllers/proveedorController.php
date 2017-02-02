<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class proveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proveedores = \App\Proveedor::all();
		
		
		return view('proveedores.listarProveedores', compact('proveedores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('proveedores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $proveedor= new \App\Proveedor;
		
		$proveedor->nombre=$request->nombre;
		$proveedor->pais=$request->pais;
		$proveedor->save();
        \Session::flash('mensaje','Creado nuevo Proveedor '.$request->nombre.' con exito.');
        return redirect('/menu');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proveedor = \App\Proveedor::find($id);

		return view('proveedores.actualizar',compact('proveedor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $proveedor = \App\Proveedor::find($request->id);
        $proveedor->nombre = $request->nombre;
        $proveedor->pais = $request->pais;
		$proveedor->save();
        
        $request->session()->flash('mensaje', 'Modificación realizada con éxito !');
		return redirect('/menu');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //echo "id: ".$id;
		$proveedor = \App\Proveedor::find($id);
        $proveedor->delete();
        
        \Session::flash('mensaje', 'Eliminación correcta del Proveedor!');
       
        return redirect('/menu');
    }
	
	public function elegirP()
    {
        $proveedores = \App\Proveedor::all();
		return view('proveedores.accionesP', compact('proveedores'));
    }
	public function porCadaProveedor(){
		$proveedores = \App\Proveedor::all();
		return view('proveedores.elegirProveedor', compact('proveedores'));
	}
	
	public function ConsultaProveedores(Request $request){
		$Proveedor= $request->input("prov");
		$proveedor = \App\Proveedor::find($Proveedor);
		$productos = \App\Producto::all();
		return view('proveedores.productosporProveedor', compact('productos'))->with('proveedor',$proveedor);
	}
}
