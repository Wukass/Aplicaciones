
@extends('layouts.principal')
@section('content')
<h1>Formulario de entrega</h1>
<form method="GET" action="{{url('/aceptar')}}">
 {{ csrf_field() }}
 <input type="hidden" name="_token" value="{{ csrf_token() }}">
	<table align="center">
	<thead>
		<th></th>
		<th>Identificador Del Producto</th>
		<th>Nombre Del Producto</th>
		<th>Precio</th>
		<th colspan="">Articulos Disponibles</th>
		<th colspan="3">Cantidad a comprar</th>
	</thead>
	<tbody>
	@foreach($comprados as $compra)	
	
		<tr>
			
			<td>
				<input type="text" name="id[]" value="{{$compra->id}}" style="display:none"/>
			</td>
			<td>{{$compra->id}}</td>
			<td>{{$compra->nombre}}</td>
			<td><span name="precio">{{$compra->precio}}</span> €</td>
			<td><p class="stock">{{$compra->stock}}</p> Unidades </td>
			<td><input type="text" name="cantidad[]" value="1"required/></td>
			<td style="visibility:hidden"><p class="confirmacion">OK</p></td>
		</tr>
	@endforeach
	<tr>
	<td colspan="7">
			<input type="button" value="Actualizar Precio Total" name="boton"/>
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<label>Nombre del Receptor:</label>
		</td>
		<td>
			<input type="text" name="receptor" required/>
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<label>Direccion de Entrega:</label>
		</td>
		<td>
			<input type="text" name="direccion" required/>
		</td>
	</tr>

	<tr>
		<td colspan="2">
			<input type="text" name="productos" value="{{$productos}}" style="display:none"/>
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<input type="text" name="precio_total" value="{{$cantidad}}" style="display:none"/>
		</td>
	</tr>
	<tr>
		<td colspan="2">
		Precio Total: <span name="total">{{$cantidad}}</span> €
		</td>
	</tr>
	</tbody>
	<tr>
		<td colspan="2">
			<input type="submit" value="Aceptar Compra"/>
		</td>
		
	</tr>
	</table>
<form>	
@endsection