
<html>
<head></head>
<body>
<h1 align="center">Acceso a la Aplicacion<h1>
@if(Session::has('validacion'))
	<div style="color:red;background-color:white;font-size:2em;text-align:center" role="alert">{{ Session::get('validacion') }} </div>
@endif
	<form method="GET" action="/validar">
	 {{ csrf_field() }}
	<table align="center">
		<div>
		<tr>
			<td><label for="nombre">Nombre:</label></td>
			<td><input type="text" name="nombre" placeholder="Nombre del usuario" required></td>
			@if(Session::has('nom'))
				<td colspan="2"><div style="color:red;text-align:center" role="alert">{{ Session::get('nom') }} </div></td>
			@endif
		</tr>
		</div>
		<div>
		<tr>
			<td><label for="precio">Contraseña de Acceso:</label></td>
			<td><input type="password" name="pass" placeholder="Contraseña" required></td>
			@if(Session::has('passw'))
				<td><div style="color:red;text-align:center" role="alert">{{ Session::get('passw') }} </div></td>
			@endif
		</tr>
		</div>
		
		<div>
		<tr>
			<td colspan="2"><input type="submit" value="Acceder" required></td>
		</tr>
		</div>
	</table>
	</form>
	<h1 align="center">Registrate si no tienes cuenta</h1>
	@if(Session::has('usuario'))
	<div style="color:red;background-color:white;font-size:2em;text-align:center" role="alert">{{ Session::get('usuario') }} </div>
	@endif
	<form method="GET" action="/registrarse">
	 {{ csrf_field() }}
	<table align="center">
		<div>
		<tr>
			<td><label for="nombre">Nombre:</label></td>
			<td><input type="text" name="nombre" placeholder="Nombre del usuario" required></td>
		</tr>
		</div>
		<div>
		<tr>
			<td><label for="precio">Contraseña:</label></td>
			<td><input type="password" name="pass" placeholder="Contraseña" required></td>
		</tr>
		</div>
		<div>
		<tr>
			<td><label for="precio">Correo:</label></td>
			<td><input type="text" name="email" placeholder="Email" required></td>
		</tr>
		</div>
		<div>
		<tr>
			<td colspan="2"><input type="submit" value="Registrarse" required></td>
		</tr>
		</div>
	</table>
	</form>
</body>
</html>