
@extends('layouts.principal')
@section('content')
@if(Session::has('mensaje'))
	<div style="color:red;background-color:white;font-size:2em;text-align:center" role="alert">{{ Session::get('mensaje') }} </div>
@endif
<h1>¿Que quieres hacer?<h1>
@endsection