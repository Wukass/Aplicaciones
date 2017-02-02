
@extends('layouts.principal')
@section('content')
<form method="GET" action="/tienda">
	<table align="center" width="600px">
	<caption>Productos</caption>
	<thead>
		<th colspan="2">Proveedor</th>
		<th colspan="2">Pais del Proveedor</th>
		<th colspan="2">Identificador del Proveedor</th>
		
	</thead>
	<tbody>
			<tr>
				<td colspan="2">{{$proveedor->nombre}}</td>
				<td colspan="2">{{$proveedor->pais}}</td>
				<td colspan="2">{{$proveedor->id}}</td>
			</tr>
	
		
				<tr><td style="text-decoration:underline" colspan="3">Nombre del Producto</td>
			@foreach($productos as $producto)
			@if($producto->id_proveedor==$proveedor->id)
				<td >{{$producto->nombre}}</td>
			@endif
			@endforeach</tr>
				<tr><td style="text-decoration:underline" colspan="3">Marca del Producto</td>
			@foreach($productos as $producto)
			@if($producto->id_proveedor==$proveedor->id)
				<td >{{$producto->marca}}</td>
			@endif
			@endforeach</tr>
				<tr><td style="text-decoration:underline" colspan="3">Identificador del Producto</td>
			@foreach($productos as $producto)
			@if($producto->id_proveedor==$proveedor->id)
				<td>{{$producto->id}}</td>
			@endif
			@endforeach</tr>
				</tr>
			</tr>
	</tbody>
	<tr>
		<td colspan="5">
			<input type="submit" value="Ver los Productos"/>
		</td>
	</tr>
	</table>
<form>	
</body>
</html>
@endsection