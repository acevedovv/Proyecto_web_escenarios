<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    // Mostrar una lista de clientes
    public function index()
    {
        $clientes = Cliente::with('user')->get();
        return view('clientes.index', ['clientes' => $clientes]);
    }

    // Mostrar un cliente específico
    public function show($id)
    {
        $cliente = Cliente::with('user')->find($id);

        if (!$cliente) {
            return view('errors.404', ['message' => 'Cliente no encontrado']);
        }

        return view('clientes.show', ['cliente' => $cliente]);
    }

    // Crear un nuevo cliente
    public function store(Request $request)
    {
        $request->validate([
            'nombre_cli' => 'required|string|max:255',
            'num_cli' => 'required|string|max:255',
            'id_usu' => 'required|exists:users,id_usu',
        ]);

        $cliente = Cliente::create($request->all());

        return redirect()->route('clientes.index')->with('success', 'Cliente creado exitosamente.');
    }

    // Actualizar un cliente existente
    public function update(Request $request, $id)
    {
        $cliente = Cliente::find($id);

        if (!$cliente) {
            return view('errors.404', ['message' => 'Cliente no encontrado']);
        }

        $request->validate([
            'nombre_cli' => 'sometimes|string|max:255',
            'num_cli' => 'sometimes|string|max:255',
            'id_usu' => 'sometimes|exists:users,id_usu',
        ]);

        $cliente->update($request->all());

        return redirect()->route('clientes.show', $cliente->id)->with('success', 'Cliente actualizado exitosamente.');
    }

    // Eliminar un cliente
    public function destroy($id)
    {
        $cliente = Cliente::find($id);

        if (!$cliente) {
            return view('errors.404', ['message' => 'Cliente no encontrado']);
        }

        $cliente->delete();

        return redirect()->route('clientes.index')->with('success', 'Cliente eliminado exitosamente.');
    }
}

