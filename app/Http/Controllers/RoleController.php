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
        return response()->json(['roles' => $roles], 200);
    }

    // Crear un nuevo rol
    public function store(Request $request)
    {
        $request->validate([
            'nombre_rol' => 'required|string|max:255',
            'desc_rol' => 'required|string|max:255',
        ]);

        $role = Role::create($request->all());

        return response()->json(['success' => 'Rol creado exitosamente', 'role' => $role], 201);
    }

    // Mostrar un rol específico
    public function show($id)
    {
        $role = Role::find($id);

        if (!$role) {
            return response()->json(['error' => 'Role no encontrado'], 404);
        }

        return response()->json(['role' => $role], 200);
    }

    // Actualizar un rol existente
    public function update(Request $request, $id)
    {
        $role = Role::find($id);

        if (!$role) {
            return response()->json(['error' => 'Role no encontrado'], 404);
        }

        $request->validate([
            'nombre_rol' => 'sometimes|string|max:255',
            'desc_rol' => 'sometimes|string|max:255',
        ]);

        $role->update($request->all());

        return response()->json(['success' => 'Rol actualizado exitosamente', 'role' => $role], 200);
    }

    // Eliminar un rol
    public function destroy($id)
    {
        $role = Role::find($id);

        if (!$role) {
            return response()->json(['error' => 'Rol no encontrado'], 404);
        }

        $role->delete();

        return response()->json(['success' => 'Role eliminado'], 200);
    }
}
