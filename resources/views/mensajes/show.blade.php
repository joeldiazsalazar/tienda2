@extends('layout')

@section('contenido')

<h1>MENSAJE</h1>


<p>Enviado por {{ $consulta->nombre }} - {{ $consulta->email}}</p>
<p>{{ $consulta->mensaje }}</p>

@stop