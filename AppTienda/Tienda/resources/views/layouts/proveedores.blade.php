@extends('layouts.app')
@section('central')
<div id="contenedor">
	<table align="center">
	<caption>Listado de Proveedores</caption>
	<thead>
		<th>Nombre</th>
		<th>Pais</th>
		<th colspan="2">Acciones</th>
	</thead>
	@yield('content')
</div>
@endsection
