@extends('layout.admin')

@section('content')
	<h3 class="mt-3">Mostrar Detalles de Cliente</h3>
	<p><strong>Nombre:</strong> {{ $client->name }}</p>
	<p><strong>Teléfono:</strong> {{ $client->phone }}</p>
	<p><strong>Email:</strong> {{ $client->email }}</p>
	<p><strong>Empresa:</strong> {{ $client->company }}</p>
	<p>{{ $client->notes ? "NOTA: {$client->notes}" : "No hay notas disponibles" }}</p>

	<hr>

	<div class="p-3 m-4 bg-light">
		<h4>Contactos</h4>
		<button class="btn btn-primary mb-2" type="button" data-bs-toggle="modal" data-bs-target="#createContactModal">
			Agregar nuevo contacto
		</button>
		@if($client->contacts->isEmpty())
			<p>No hay contactos disponibles</p>
		@else
			<table class="table">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Teléfono</th>
						<th>Email</th>
						<th>Empresa</th>
						<th>Posicion</th>
						<th>Cargo</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($client->contacts as $contact)
						<tr>
							<td>{{ $contact->name }}</td>
							<td>{{ $contact->phone }}</td>
							<td>{{ $contact->email }}</td>
							<td>{{ $contact->company }}</td>
							<td>{{ $contact->position }}</td>
							<td>

								<!-- <a class="btn btn-warning btn-sm edit-contact-btn" data-id="{{ $contact->id }}"
									data-url="{{ route('clients.contacts.edit', [$client, $contact]) }}" data-bs-toggle="modal"
									data-bs-target="#editContactModal">Editar</a>

								<a class="btn btn-danger btn-sm delete-contact-btn" data-id="{{ $contact->id }}"
									data-url="{{ route('clients.contacts.destroy', [$client, $contact]) }}" data-bs-toggle="modal"
									data-bs-target="#deleteContactModal">Eliminar</a> -->

								<a class="btn btn-warning btn-sm"
									href="{{ route('clients.contacts.edit', [$client, $contact]) }}">Editar</a>

								<form method="post" style="display:inline"
									action="{{ route('clients.contacts.destroy', [$client, $contact]) }}">
									@csrf
									@method('DELETE')
									<button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
								</form>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		@endif
	</div>

	@include('clients.contacts.create')

@endsection