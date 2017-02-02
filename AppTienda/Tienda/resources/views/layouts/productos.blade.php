@extends('layouts.app')
@section('central')
<div id="contenedor">
	<table align="center">
	<caption>Listado de Productos</caption>
	<thead>
		<th>Nombre</th>
		<th>Precio</th>
		<th>Marca</th>
		<th>Stock</th>
		<th colspan="2">Acciones</th>
	</thead>
	@yield('content')
</div>
@endsection
