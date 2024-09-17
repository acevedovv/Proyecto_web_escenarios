<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\PDF;


class UserController extends Controller
{
    // Mostrar una lista de usuarios
    public function index()
    {
        $users = User::with('role')->get();
        return view('usuarios.index', ['users' => $users]);
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
    
    // Crear un controlador para la vista de gráficos
    public function chart()
    {
        $users = DB::table('users')
                   ->select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
                   ->whereYear('created_at', date('Y'))
                   ->groupBy('month_name')
                   ->orderBy(DB::raw("MIN(created_at)"))
                   ->get();

        $months = $users->pluck('month_name');
        $counts = $users->pluck('count');

        return view('usuarios.chart', compact('months', 'counts'));
    }
    // Controlador para generar un reporte de usuarios

    public function reporte()
    {
        $users = User::all();

        $pdf = PDF::loadView('usuarios.reporte', compact('users'));

        return $pdf->download('reporte_usuarios.pdf');
    }

}
