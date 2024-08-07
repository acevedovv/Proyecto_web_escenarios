<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Mostrar una lista de usuarios
    public function index()
    {
        $users = User::with('role')->get();
        return response()->json($users);
    }

    // Mostrar un usuario específico
    public function show($id)
    {
        $user = User::with('role')->find($id);

        if (!$user) {
            return response()->json(['message' => 'User no encontrado'], 404);
        }

        return response()->json($user);
    }

    // Crear un nuevo usuario
    public function store(Request $request)
    {
        $request->validate([
            'nombre_usu' => 'required|string|max:255',
            'num_usu' => 'required|string|unique:users|max:255',
            'id_rol' => 'required|exists:roles,id_rol',
        ]);

        $user = User::create($request->all());

        return response()->json($user, 201);
    }

    // Actualizar un usuario existente
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User no encontrado'], 404);
        }

        $request->validate([
            'nombre_usu' => 'sometimes|string|max:255',
            'num_usu' => 'sometimes|string|max:255|unique:users,num_usu,' . $id,
            'id_rol' => 'sometimes|exists:roles,id_rol',
        ]);

        $user->update($request->all());

        return response()->json($user);
    }

    // Eliminar un usuario
    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User no encontrado'], 404);
        }

        $user->delete();

        return response()->json(['message' => 'User eliminado exitosamente']);
    }
}
