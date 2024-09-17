<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class UserController extends Controller
{
    // Mostrar una lista de usuarios
    public function index()
    {
        $users = User::with('role')->get();
        return view('usuarios.index', ['users' => $users]);
    }

    public function generarPDF()
    {
        $users = User::all();
        $pdf = Pdf::loadView('usuarios.download', compact('users'));
        return $pdf->download('usuarios.pdf');
    }
    

    // Mostrar un usuario específico
    public function show($id)
    {
        $user = User::with('role')->find($id);

        if (!$user) {
            return redirect()->route('usuarios.index')->with('error', 'Usuario no encontrado');
        }

        return view('usuarios.show', ['user' => $user]);
    }

    // Crear un nuevo usuario (Formulario)
    public function create()
    {
        // Asumiendo que necesitas pasar los roles para el formulario de creación
        $roles = \App\Models\Role::all();
        return view('usuarios.create', ['roles' => $roles]);
    }

    // Guardar un nuevo usuario
    public function store(Request $request)
    {
        $request->validate([
            'nombre_usu' => 'required|string|max:255',
            'num_usu' => 'required|string|unique:users|max:255',
            'id_rol' => 'required|exists:roles,id_rol',
        ]);

        User::create($request->all());

        return redirect()->route('usuarios.index')->with('success', 'Usuario creado exitosamente');
    }

    // Editar un usuario existente (Formulario)
    public function edit($id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('usuarios.index')->with('error', 'Usuario no encontrado');
        }

        // Asumiendo que necesitas pasar los roles para el formulario de edición
        $roles = \App\Models\Role::all();
        return view('usuarios.edit', ['user' => $user, 'roles' => $roles]);
    }

    // Actualizar un usuario existente
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('usuarios.index')->with('error', 'Usuario no encontrado');
        }

        $request->validate([
            'nombre_usu' => 'sometimes|string|max:255',
            'num_usu' => 'sometimes|string|max:255|unique:users,num_usu,' . $id,
            'id_rol' => 'sometimes|exists:roles,id_rol',
        ]);

        $user->update($request->all());

        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado exitosamente');
    }

    // Eliminar un usuario
    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('usuarios.index')->with('error', 'Usuario no encontrado');
        }

        $user->delete();

        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado exitosamente');
    }
}
