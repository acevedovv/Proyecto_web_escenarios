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
        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        // Solo retorna la vista para crear un nuevo rol
        return view('roles.create');
    }
    
    // Mostrar un rol específico
    public function show($id)
    {
        $role = Role::find($id);

        if (!$role) {
            return redirect()->route('roles.index')->with('error', 'Role not found');
        }

        return view('roles.show', compact('role'));
    }

    // Crear un nuevo rol
    public function store(Request $request)
    {
        $request->validate([
            'nombre_rol' => 'required|string|max:255',
            'desc_rol' => 'required|string|max:255',
        ]);

        $role = Role::create($request->all());

        return redirect()->route('roles.index')->with('success', 'Role created successfully');
    }

    // Mostrar formulario de edición
    public function edit($id)
    {
        $role = Role::find($id);

        if (!$role) {
            return redirect()->route('roles.index')->with('error', 'Role not found');
        }

        return view('roles.edit', compact('role'));
    }

    // Actualizar un rol existente
    public function update(Request $request, $id)
    {
        $role = Role::find($id);

        if (!$role) {
            return redirect()->route('roles.index')->with('error', 'Role not found');
        }

        $request->validate([
            'nombre_rol' => 'sometimes|string|max:255',
            'desc_rol' => 'sometimes|string|max:255',
        ]);

        $role->update($request->all());

        return redirect()->route('roles.index')->with('success', 'Role updated successfully');
    }

    // Eliminar un rol
    public function destroy($id)
    {
        $role = Role::find($id);

        if (!$role) {
            return redirect()->route('roles.index')->with('error', 'Role not found');
        }

        $role->delete();

        return redirect()->route('roles.index')->with('success', 'Role deleted successfully');
    }
}
