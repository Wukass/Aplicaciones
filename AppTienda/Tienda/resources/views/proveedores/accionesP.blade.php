
@extends('layouts.proveedores')
@section('content')

	@foreach($proveedores as $proveedor)
	<tbody>
		<td>{{$proveedor->nombre}}</td>
		<td>{{$proveedor->id}}</td>
		<td><a href="{{ route('proveedor.edit', $proveedor->id) }}">Modificar Proveedor</a></td>
		<td><a href="/borrarP/{{ $proveedor->id }}">Eliminar Proveedor</a></td>
	</tbody>
	@endforeach
	</table>
	
</body>
</html>
@endsection