@extends('layout.admin')

@section('content')

	<h3>Clientes Eliminados</h3>
	<div class="row mb-3">
		<div class="col-xl-3 col-md-6">
			<a href="{{ route('clients.index') }}" class="btn btn-primary">Index Clientes</a>
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
							<td>
								<form action="{{ route('clients.activate', $client->id) }}" method="post" style="display:inline">
									@csrf
									@method('PUT')
									<button class="btn btn-success btn-sm" type="submit">REINGRESAR</button>
								</form>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection