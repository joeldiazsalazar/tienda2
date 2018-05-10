@extends('layout')

@section('contenido')

<h1>Todos los mensajes</h1>

<table class="table">
	
	<thead>
		
		<tr>
			<th>ID</th>
			<th>Nombre</th>
			<th>Email</th>
			<th>Mensaje</th>
			<th>Acciones</th>
		</tr>

	</thead>

	<tbody>



		@foreach ($messages as $messa)

		<tr>
			<td>{{ $messa->id}}</td>
			<td>
				<a href="{{ route('mensajes.show', $messa->id) }}">
					{{ $messa->nombre }}
				</a>

			</td>
			
			<td>{{ $messa->email }}</td>
			<td>{{ $messa->mensaje }}</td>
			<td>

				<a class="btn btn-info btn-xs" href="{{ route('mensajes.edit', $messa->id) }}">Editar</a>
				<form style="display: inline;" method="POST" action=" {{ route('mensajes.destroy', $messa->id) }}">

					{!! csrf_field() !!}
					{!! method_field('DELETE') !!}
					
					<button class="btn btn-danger btn-xs" type="submit">Eliminar</button>

				</form>

			</td>
		</tr>

		@endforeach



	</tbody>
</table>

@stop