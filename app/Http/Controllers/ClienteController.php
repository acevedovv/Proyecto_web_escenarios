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
        return response()->json($clientes);
    }

    // Mostrar un cliente específico
    public function show($id)
    {
        $cliente = Cliente::with('user')->find($id);

        if (!$cliente) {
            return response()->json(['message' => 'Cliente no encontrado'], 404);
        }

        return response()->json($cliente);
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

        return response()->json($cliente, 201);
    }

    // Actualizar un cliente existente
    public function update(Request $request, $id)
    {
        $cliente = Cliente::find($id);

        if (!$cliente) {
            return response()->json(['message' => 'Cliente no encontrado'], 404);
        }

        $request->validate([
            'nombre_cli' => 'sometimes|string|max:255',
            'num_cli' => 'sometimes|string|max:255',
            'id_usu' => 'sometimes|exists:users,id_usu',
        ]);

        $cliente->update($request->all());

        return response()->json($cliente);
    }

    // Eliminar un cliente
    public function destroy($id)
    {
        $cliente = Cliente::find($id);

        if (!$cliente) {
            return response()->json(['message' => 'Cliente no encontrado'], 404);
        }

        $cliente->delete();

        return response()->json(['message' => 'Cliente eliminado exitosamente']);
    }
}

