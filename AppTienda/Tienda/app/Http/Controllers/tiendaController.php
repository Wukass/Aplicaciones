<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class tiendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = \App\Producto::all();
		
		foreach( $productos as $producto ) {
			echo $producto->nombre;
			echo" - ";
			echo $producto->precio;
			echo"<br>";
		}
		$producto = \App\Producto::where('nombre','tomates')->first();
		//echo "producto: ".$producto;
		return view('listar', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $producto= new \App\Producto;
		
		$producto->nombre=$request->nombre;
		$producto->precio=$request->precio;
		$producto->marca=$request->marca;
		$producto->id_proveedor=$request->id_proveedor;
		$producto->stock=$request->stock;
		//echo $request->nombre;
		//echo $request->precio;
		//echo $request->marca;
		//echo $request->proveedor;
		$producto->save();
        \Session::flash('mensaje','Creado nuevo producto '.$request->nombre.' con exito.');
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //echo "id: ".$id;
		$producto = \App\Producto::find($id);

		return view('actualizar',compact('producto'));
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
        $producto = \App\Producto::find($request->id);
        $producto->precio = $request->precio;
        $producto->marca = $request->marca;
        $producto->stock = $request->stock;
		$producto->save();
        
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
		echo "id: ".$id;
		$producto = \App\Producto::find($id);
        $producto->delete();
        
        \Session::flash('mensaje', 'Eliminación correcta del producto!');
       
        return redirect('/menu');
    }
	
	public function menu()
    {
        return view('index');
    }
	
	public function listar()
    {
        $productos = \App\Producto::paginate(4);
		//$producto = \App\Producto::where('nombre','tomates')->first();
		//echo "producto: ".$producto->nombre;
		return view('listar', compact('productos'));
    }
	
	public function elegir()
    {
        $productos = \App\Producto::all();
		return view('acciones', compact('productos'));
    }
}
