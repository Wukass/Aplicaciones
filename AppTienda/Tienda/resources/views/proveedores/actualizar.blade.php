@extends('layouts.principal')
@section('content')
<h1>Formulario de Modificacion<h1>
<form method="POST" action="{{url('/updateP')}}">
 {{ csrf_field() }}
 <input type="hidden" name="_token" value="{{ csrf_token() }}">
	<table align="center">
	<thead>
		<th>Nombre Del Proveedor</th>
		<th>Nombre Nuevo del Proveedor</th>
		<th>Pais del Proveedor</th>
		<th>Pais Nuevo del Proveedor</th>
	</thead>
	<tbody>
		<tr>			
			<td >{{$proveedor->nombre}}</td>
			<td><input type="text" name="nombre" value="{{$proveedor->nombre}}"/></td>
			<td >{{$proveedor->pais}}</td>
			<td><input type="text" name="pais" value="{{$proveedor->pais}}"/></td>
			<input type="text" name="id" value="{{$proveedor->id}}" style="display:none"/>
		</tr>
	</tbody>
	<tr>
		<td colspan="4">
			<input type="submit" value="Actualizar Proveedor"/>
		</td>
	</tr>
	</table>
<form>	
</body>
</html>
@endsection