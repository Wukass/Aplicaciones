
@extends('layouts.principal')
@section('content')
<h1>Formulario De Proveedores<h1>
	<form method="POST" action="{{ url('/storeP')}}">
	<table align="center">
	 {{ csrf_field() }}
	<div>
	<tr>
		<td><label for="nombre">Nombre:</label></td>
		<td><input type="text" name="nombre" placeholder="Nombre del proveedor" required></td>
	</tr>
	</div>
	<div>
	<tr>
		<td><label for="precio">Pais:</label></td>
		<td><input type="text" name="pais" placeholder="Pais del proveedor" required></td>
	</tr>
	</div>
	<tr>
	<td colspan="2"><input type="submit" value="Crear Proveedor"></td>
	</tr>
	</table>
	</form>
</body>
</html>
@endsection