
@extends('layouts.principal')
@section('content')
<h1>Formulario De Productos<h1>
	<form method="POST" action="{{ url('/store')}}">
	 {{ csrf_field() }}
	<table align="center">
	<div>
	<tr>
		<td><label for="nombre">Nombre:</label></td>
		<td><input type="text" name="nombre" placeholder="Nombre del producto" required></td>
	</tr>
	</div>
	<div>
	<tr>
		<td><label for="precio">Precio:</label></td>
		<td><input type="text" name="precio" placeholder="Precio del producto" required></td>
	</tr>
	</div>
	<div>
	<tr>
		<td><label for="marca">Marca:</label></td>
		<td><input type="text" name="marca" placeholder="Marca del producto" required></td>
	</tr>
	</div>
	<div>
	<tr>
		<td><label for="stock">Cantidad:</label></td>
		<td><input type="text" name="stock" placeholder="Unidades disponibles" required></td>
	</tr>
	</div>
	<div>
	<tr>
		<td><label for="stock">ID del proveedor:</label></td>
		<td><input type="text" name="id_proveedor" placeholder="Codigo del Proveedor" required></td>
	</tr>
	</div>
	<tr>
	<td colspan="2"><input type="submit" value="Crear Articulo"></td>
	</tr>
	</form>
</body>
</html>
@endsection