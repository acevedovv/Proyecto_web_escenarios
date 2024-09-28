<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    // Mostrar una lista de roles
    public function index()
    {
        $roles = Role::all(); // Obtiene todos los roles

        // Verifica si se obtuvieron roles y devuelve una respuesta JSON adecuada
        if ($roles->isEmpty()) {
            return response()->json([
                'success' => true,
                'data' => [],
                'message' => 'No roles found'
            ], 200);
        }

        return response()->json([
            'success' => true,
            'data' => $roles,
            'message' => 'Roles retrieved successfully'
        ], 200);
    }

    // Mostrar un rol específico
    public function show($id)
    {
        $role = Role::find($id);

        if (!$role) {
            return response()->json([
                'success' => false,
                'message' => 'Role not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $role,
            'message' => 'Role retrieved successfully'
        ], 200);
    }

    // Crear un nuevo rol
    public function store(Request $request)
    {
        $request->validate([
            'nombre_rol' => 'required|string|max:255',
            'desc_rol' => 'required|string|max:255',
        ]);

        $role = Role::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Role created successfully',
            'data' => $role,
        ], 201);
    }

    // Actualizar un rol existente
    public function update(Request $request, $id)
    {
        $role = Role::find($id);

        if (!$role) {
            return response()->json([
                'success' => false,
                'message' => 'Role not found',
            ], 404);
        }

        $request->validate([
            'nombre_rol' => 'sometimes|string|max:255',
            'desc_rol' => 'sometimes|string|max:255',
        ]);

        $role->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Role updated successfully',
            'data' => $role,
        ], 200);
    }

    // Eliminar un rol
    public function destroy($id)
    {
        $role = Role::find($id);
    
        if (!$role) {
            return response()->json([
                'success' => false,
                'message' => 'Role not found',
            ], 404);
        }
    
        $role->delete();
    
        return response()->json([
            'success' => true,
            'message' => 'Role deleted successfully',
        ], 200);
    }
}
