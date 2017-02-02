@extends('layouts.principal')
@section('content')
<h1>Formulario de Modificacion<h1>
<form method="POST" action="{{url('/update')}}">
 {{ csrf_field() }}
 <input type="hidden" name="_token" value="{{ csrf_token() }}">
	<table align="center">
	<thead>
		<th>Nombre Del Producto</th>
		<th>Precio</th>
		<th>Marca</th>
		<th>Identificador del Proveedor</th>
		<th>Stock</th>
	</thead>
	<tbody>
		<tr>			
			<td >{{$producto->nombre}}</td>
			<td><input type="text" name="precio" value="{{$producto->precio}}"/> €</td>
			<td><input type="text" name="marca" value="{{$producto->marca}}"/></td>
			<td>{{$producto->id_proveedor}}</td>
			<td><input type="text" name="stock" value="{{$producto->stock}}"/> Unidades</td>
			<input type="text" name="id" value="{{$producto->id}}" style="display:none"/>
		</tr>
	</tbody>
	<tr>
		<td colspan="2">
			<input type="submit" value="Actualizar Producto"/>
		</td>
	</tr>
	</table>
<form>	
</body>
</html>
@endsection