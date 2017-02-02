
@extends('layouts.principal')
@section('content')

	<table align="center">
	<caption>Listado de Productos</caption>
	<thead>
		<th>Identificador del Producto</th>
		<th>Nombre</th>
		<th>Precio</th>
		<th>Marca</th>
		<th>Stock</th>
		<th>Identificador del Proveedor</th>
	</thead>
	@foreach($productos as $producto)
	<tbody>
		<td>{{$producto->id}}</td>
		<td>{{$producto->nombre}}</td>
		<td>{{$producto->precio}}</td>
		<td>{{$producto->marca}}</td>
		<td>{{$producto->stock}}</td>
		<td>{{$producto->id_proveedor}}</td>
	</tbody>
	@endforeach
	</table>
	<section class="paginas">{{$productos->links()}}</section>
	
</body>
</html>
@endsection