@extends('layout.admin')

@section('content')

	<h3>Clientes</h3>
	@if (session('success'))
		<div class="alert alert-success" role="alert">
			{{ session('success') }}
		</div>
	@endif


	<div class="row mb-3">
		<div class="col-xl-3 col-md-6">
			<a href="{{ route('clients.create') }}" class="btn btn-primary">Nuevo</a>
			<a href="{{ route('clients.deleted') }}" class="btn btn-warning">Historial</a>
		</div>
	</div>

	<div class="row">
		<div class="col-12">
			<table class="table">
				<thead>
					<tr>
						<th>Id</th>
						<th>Nombre</th>
						<th>Correo</th>
						<th>Teléfono</th>
						<th>Usuario</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($clients as $client)
						<tr>
							<td>{{ $client->id }}</td>
							<td>{{ $client->name }}</td>
							<td>{{ $client->mail }}</td>
							<td>{{ $client->phone }}</td>
							<td>{{ $client->user->name }}</td>
							<td>
								<a class="btn btn-warning btn-sm" href="{{ route('clients.edit', $client->id) }}"> Editar</a>
								<!-- <a class="btn btn-danger btn-sm" href="{{ route('clients.destroy', $client->id) }}"> Eliminar</a> -->

								<form action="{{ route('clients.destroy', $client->id) }}" method="post" style="display:inline">
									@csrf
									@method('DELETE')
									<button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
								</form>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection