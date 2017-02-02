
@extends('layouts.productos')
@section('content')

	@foreach($productos as $producto)
	<tbody>
		<td>{{$producto->nombre}}</td>
		<td>{{$producto->precio}}</td>
		<td>{{$producto->marca}}</td>
		<td>{{$producto->stock}}</td>
		<td><a href="{{ route('producto.edit', $producto->id) }}">Modificar Producto</a></td>
		<td><a href="/borrar/{{ $producto->id }}">Eliminar Producto</a></td>
	</tbody>
	@endforeach
	</table>
	
</body>
</html>
@endsection