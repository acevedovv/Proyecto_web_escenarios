<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    // Mostrar una lista de roles
    public function index()
    {
        $roles = Role::all();
        return response()->json($roles);
    }

    // Mostrar un rol específico
    public function show($id)
    {
        $role = Role::find($id);

        if (!$role) {
            return response()->json(['message' => 'Role not found'], 404);
        }

        return response()->json($role);
    }

    // Crear un nuevo rol
    public function store(Request $request)
    {
        $request->validate([
            'nombre_rol' => 'required|string|max:255',
            'desc_rol' => 'required|string|max:255',
        ]);

        $role = Role::create($request->all());

        return response()->json($role, 201);
    }

    // Actualizar un rol existente
    public function update(Request $request, $id)
    {
        $role = Role::find($id);

        if (!$role) {
            return response()->json(['message' => 'Role no encontrado'], 404);
        }

        $request->validate([
            'nombre_rol' => 'sometimes|string|max:255',
            'desc_rol' => 'sometimes|string|max:255',
        ]);

        $role->update($request->all());

        return response()->json($role);
    }

    // Eliminar un rol
    public function destroy($id)
    {
        $role = Role::find($id);

        if (!$role) {
            return response()->json(['message' => 'Role no encontrado'], 404);
        }

        $role->delete();

        return response()->json(['message' => 'Role eliminado exitosamente']);
    }
}
