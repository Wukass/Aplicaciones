<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Farcades\Session;
use Illuminate\Support\Farcades\Redirect;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class compraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ventas = \App\Venta::paginate(3);
		//var_dump($ventas);
		return view('venta.ventas', compact('ventas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$stocks=$request->cantidad;		
		$ids=$request->id;
		$pos=0;
        $venta= new \App\Venta;
		
		$venta->nombre=$request->receptor;
		$venta->direccion=$request->direccion;
		$venta->productos=$request->productos;
		$venta->total_pagar=$request->precio_total;
		foreach($ids as $id){
			$producto = \App\Producto::find($id);
			$producto->stock=($producto->stock-$stocks[$pos]);
			$pos++;
			$producto->save();
		}
		var_dump($request->id);
		var_dump($request->cantidad);
		
		$venta->save();
        \Session::flash('mensaje',$request->receptor.', su compra ha sido realizada con exito. En unos dias la recibirá en su domicilio. ');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
	
	public function elegir()
    {
        $productos = \App\Producto::all();
		return view('productos', compact('productos'));
    }
	
	public function redireccion(Request $request)
    {
        Session:flash('mensaje','Compra realizada con exito');
		
		return view('productos', compact('productos'));
    }
	
	public function comprar(Request $request)
    {
		$array= $request->input("prod");
		$pos=0;
		$cantidad=0;
		$cadena="";
		foreach($array as $caso){
			$producto = \App\Producto::where('id',$caso)->first();
			$comprados[$pos]=$producto;
			$pos++;
			$cantidad+=$producto->precio;
			$cadena.=$producto->nombre;
			$cadena.=" ";			
		}
		return view('compra', compact('comprados'))->with('cantidad',$cantidad)->with('productos',$cadena);
    }
}
