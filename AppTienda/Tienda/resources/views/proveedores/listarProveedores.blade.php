
@extends('layouts.principal')
@section('content')

	<table align="center">
	<caption>Listado de Proveedores</caption>
	<thead>
		<th>Identificador</th>
		<th>Proveedor</th>
		<th>Pais</th>
	</thead>
	@foreach($proveedores as $proveedor)
	<tbody>
		<td>{{$proveedor->id}}</td>
		<td>{{$proveedor->nombre}}</td>
		<td>{{$proveedor->pais}}</td>
	</tbody>
	@endforeach
	</table>
	
</body>
</html>
@endsection