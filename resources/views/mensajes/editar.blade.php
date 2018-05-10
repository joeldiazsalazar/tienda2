@extends('layout')

@section('contenido')

<h1>EDITANDO CONTENIDO</h1>

<form method="POST" action=" {{ route('mensajes.update', $editar->id)}} ">
	{!! method_field('PUT') !!}

	{!! csrf_field() !!}
	
<p><label for="nombre">
	Nombre

	<input class="form-control" type="text" name="nombre" value="{{ $editar->nombre }}">

	{!! $errors->first('nombre','<span class=error>:message</span>')!!}
</label></p>

<p><label for="email">
	Email
	<input class="form-control" type="text" name="email" value="{{ $editar->email}}">

	{!! $errors->first('email','<span class=error>:message</span>')!!}
</label></p>

<p><label for="mensaje">
	
	Mensaje

	<textarea class="form-control" name="mensaje" >{{ $editar->mensaje}}</textarea>

	{!! $errors->first('mensaje','<span class=error>:message</span>')!!}

</label></p>

<input class="btn btn-primary" type="submit" name="Enviar">

</form>

@stop
