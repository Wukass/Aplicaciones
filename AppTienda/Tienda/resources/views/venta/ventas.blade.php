
@extends('layouts.principal')
@section('content')

	<table align="center">
	<caption>Listado de Ventas</caption>
	<thead>
		<th>Identificador de la Venta</th>
		<th>Nombre del Comprador</th>
		<th>Direccion de Entrega</th>
		<th>Productos Comprados</th>
		<th>Precio Total</th>
	</thead>
	@foreach($ventas as $venta)
	<tbody>
		<td>{{$venta->id}}</td>
		<td>{{$venta->nombre}}</td>
		<td>{{$venta->direccion}}</td>
		<td>{{$venta->productos}}</td>
		<td>{{$venta->total_pagar}} €</td>
	</tbody>
	@endforeach
	</table>
	<section class="paginas">{{$ventas->links()}}</section>
	
</body>
</html>
@endsection