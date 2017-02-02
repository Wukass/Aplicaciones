
@extends('layouts.principal')
@section('content')
<form method="GET" action="/confirmar">
	<table align="center" width="600px">
	<caption>Seleccione los Productos que desea comprar</caption>
	<thead>
		<th></th>
		<th>Nombre</th>
		<th>Precio</th>
	</thead>
	<tbody>
	@foreach($productos as $producto)	
		@if($producto->stock!=0)
			<tr>
				<td><input type="checkbox" name="prod[]" value="{{$producto->id}}"></td>
				<td>{{$producto->nombre}}</td>
				<td>{{$producto->precio}} €</td>
			</tr>
		@endif
	@endforeach
	</tbody>
	<tr>
		<td>
			<input type="submit" value="Comprar"/>
		</td>
	</tr>
	</table>
<form>	
</body>
</html>
@endsection