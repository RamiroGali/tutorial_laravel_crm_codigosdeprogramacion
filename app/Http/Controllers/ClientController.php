<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // // Cargar los registros de todos los clientes relacionados con aquello que los invoque
        // $clients = Client::all();

        // Cargar los registros de los clientes relacionados que cumplan con la condición 'where'
        $clients = Client::where('active', 1)->get();

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
        $request->validate([
            'name' => 'required|min:5|max:255',
            'email' => 'nullable|email',
        ]);

        $client = Client::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'company' => $request->company,
            'notes' => $request->notes,
            // 'active'=> $request->active
            'user_id' => auth()->id()
        ]);

        return redirect()
            ->route('clients.index')
            ->with('success', 'Cliente creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //
    }

    // // Hacer una edición de un registro usando su id de una manera menos automatizada
    // public function edit($id){
    //     $client = Client::findOrFail($id);
    //     return view('clients.edit', compact('client'));
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
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
}
