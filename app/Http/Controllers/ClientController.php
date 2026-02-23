<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class ClientController extends Controller
{
    // public static function middleware()
    // {
    //     return [
    //         'auth',
    //         new Middleware('permission:clientes', only: ['index']),
    //         new Middleware('permission:clientes-crear', only: ['create', 'store']),
    //         new Middleware('permission:clientes-editar', only: ['edit', 'update']),
    //         new Middleware('permission:clientes-eliminar', only: ['destroy']),
    //         new Middleware('permission:clientes-reingresar', only: ['activate']),
    //     ];
    // }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // // Cargar los registros de todos los clientes relacionados con aquello que los invoque
        // $clients = Client::all();

        // // Cargar los registros de los clientes relacionados que cumplan con la condición 'where'
        // $clients = Client::where('active', 1)->get();

        // Cargar los registros de los clientes relacionados que cumplan con la condición 'where'
        // y desarrollar una paginación de 10 elementos en la vista
        $clients = Client::where('active', 1)->paginate(10);

        return view('clients.index', compact('clients'));
    }

    /**
     * Display a listing of the resource.
     */
    public function deleted()
    {
        // // Cargar los registros de todos los clientes relacionados con aquello que los invoque
        // $clients = Client::all();

        // Cargar los registros de los clientes relacionados que cumplan con la condición 'where'
        $clients = Client::where('active', 0)->get();

        return view('clients.deleted', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // 
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'name' => 'required|string|min:5|max:255',
            'email' => 'nullable|email',
            'phone' => 'nullable|string|max:20',
            'company' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
            // 'active'=> $request->active
        ]);
        $validated['user_id'] = auth()->id();

        // Seleccionar solo los parámetros válidos del nuevo 'client'
        $attributes = [
            'name' => $validated->name,
            'email' => $validated->email,
            'phone' => $validated->phone,
            'company' => $validated->company,
            'notes' => $validated->notes,
            // 'active'=> $validated->active
            'user_id' => $validated->user_id,
        ];

        // Usar el modelo para crear al cliente
        $client = Client::create($attributes);

        // Hacer uso de la variable $client
        $clientId = $client->id;

        // // Guardar en logs o disparar un evento
        // Log::info("Cliente creado con ID: {$clientId}");

        // Mandar al navegador al enrutador "clients.index", con mensaje.
        return redirect()
            ->route('clients.index', $client)
            ->with('success', 'Cliente creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        // Pendiente: por qué funciona si está comentado... :/
        $client->load('contacts');

        // // // Developer: Proceso para depurar un error como desarrollador
        // print_r($client);
        // exit;

        return view('clients.show', compact('client'));
    }

    // // Hacer una edición de un registro usando su id de una manera menos automatizada
    // public function edit($id){
    //     $client = Client::findOrFail($id);
    //     return view('clients.edit', compact('client'));
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $client = Client::find($id);

        // Si el cliente no ha sido encontrado en la base de datos, envíe al navegador la view de notfound.
        if (!$client)
            return view('clients.notfound');
        else
            // El Modelo se encargará de realizar la consulta automáticamente, por lo que no se hace la consulta con query a la base de datos
            return view('clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        //
        $request->validate([
            'name' => 'required|min:5|max:255',
            'email' => 'nullable|email',
        ]);

        $client->update($request->all());


        return redirect()
            ->route('clients.index')
            ->with('success', 'Cliente actualizado');
    }

    /**
     * Reactive the specified resource from storage.
     */
    public function activate(Client $client)
    {
        //
        $client->update(['active' => 1]);
        return redirect()
            ->route('clients.index')
            ->with('success', 'Cliente reinsertado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        //
        $client->update(['active' => 0]);
        return redirect()
            ->route('clients.index')
            ->with('success', 'Cliente eliminado correctamente');
    }

    public function generatePDF($id)
    {
        $client = Client::with('followUps')->findOrFail($id);
        // $logo = Settings::getValue('logo');

        // $pdf= PDF::loadView('clients.details', compact('client', 'logo'))->setPaper('letter');
        // return $pdf->download('cliente_' . $client->id . '.pdf');
    }

    public function exportExcel()
    {
        // return Excel::download(new ClientExport, 'clients.xlsx');
    }

    public function import(Request $request)
    {
        // print_r($request->file('file'));
        // Excel::import(new ClientsImport, $request->file('file'));

        // return redirect()->route('clients.index')->with('success', 'Carga masiva de clientes realizada con éxito');
    }
}
