@extends('layout.admin')

@section('content')

	<h3 class="mt-3">Clientes</h3>
	
	@if (session('success'))
		<div class="alert alert-success" role="alert">
			{{ session('success') }}
		</div>
	@endif
	
	<div class="row mb-3">
		<div class="col-xl-3 col-md-6">
			<a class="btn btn-primary" href="{{ route('clients.create') }}">Nuevo</a>
			<a class="btn btn-warning" href="{{ route('clients.deleted') }}">Historial</a>
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
								<a class="btn btn-primary btn-sm" href="{{ route('clients.show', $client->id) }}">Detalles</a>
								
								<a class="btn btn-warning btn-sm" href="{{ route('clients.edit', $client->id) }}">Editar</a>

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
			{!! $clients->links() !!}
		</div>
	</div>
	
@endsection