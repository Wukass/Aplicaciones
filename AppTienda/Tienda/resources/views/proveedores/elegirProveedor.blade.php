
@extends('layouts.principal')
@section('content')
<h1>¿Que Proveedores quiere Consultar?</h1>
<form method="get" action="/ConsultaProveedores">
 {{ csrf_field() }}
 <input type="hidden" name="_token" value="{{ csrf_token() }}">
	<table align="center">
	<thead>
		<th></th>
		<th>Identificador Del Proveedor</th>
		<th>Nombre Del Proveedor</th>
		<th>Pais del Proveedor</th>
	</thead>
	<tbody>
	@foreach($proveedores as $proveedor)	
	
		<tr>
			<td><input type="radio" name="prov" value="{{$proveedor->id}}"></td>
			<td>{{$proveedor->id}}</td>
			<td>{{$proveedor->nombre}}</td>
			<td>{{$proveedor->pais}}</td>
		</tr>
	@endforeach
	
		<td colspan="2">
			<input type="submit" value="Consultar Proveedor"/>
		</td>
	</tr>
	</table>
<form>	
@endsection