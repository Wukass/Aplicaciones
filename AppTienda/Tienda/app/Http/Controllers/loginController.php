<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class loginController extends Controller
{
   /*Funcion para Validar el Usuario*/
    public function validacion()
    {
        return view('validacion.login');
    }
	
	public function registro(Request $request)
    {
        $usuario= new \App\USer;
		
		$usuario->name=$request->nombre;
		$usuario->email=$request->email;
		$usuario->password=$request->pass;
		$usuario->save();
		\Session::flash('usuario','Creado nuevo usuario '.$request->nombre);
        return redirect('/index');
    }
	
	public function validar(Request $request)
    {
        $usuarios = \App\User::all();
        $nombre = $request->nombre;
        $pass = $request->pass;
		$encontrado=false;
		$nom=true;
		$passw=true;
		echo $nombre." - ".$pass;
		foreach($usuarios as $usuario){
			if($usuario->name==$nombre){
				if($usuario->password==$pass){
					$encontrado=true;
				}else{
					$passw=false;
				}
			}
		}
		foreach($usuarios as $usuario){
			if($usuario->name!=$nombre){
				$nom=false;
			}
		}
		
		if($encontrado==false){
			if($nom==false){
				\Session::flash('nom', 'Usuario no encontrado');
			}
			if($passw==false){
				\Session::flash('passw', 'Contraseña no valida');
			}
		return redirect('/index');
		
		}else{
		return redirect('/menu');
		}
    }

}
