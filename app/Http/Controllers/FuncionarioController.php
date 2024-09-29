<?php

namespace App\Http\Controllers;
use App\Models\User; 
use App\Models\Funcionario;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
    // public function index()
    // {
    //     $funcionarios = Funcionario::all();
    //     return response()->json($funcionarios);
    // }


    // public function create()
    // {
    //     // Obtén todos los usuarios desde la base de datos
    //     $users = User::all(); 

    //      // Pasa la variable $users a la vista 'funcionarios.create'
    //     return view('funcionarios.create', compact('users'));
    // }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'nombre_fun' => 'required|string|max:255',
    //         'user_id' => 'required|exists:users,id',
    //     ]);

    //     Funcionario::create($request->all());

    //     return redirect()->route('funcionarios.index');
    // }

    // public function show(Funcionario $funcionario)
    // {
    //     return view('funcionarios.show', compact('funcionario'));
    // }

    // public function edit($id_fun)
    // {
    //     // Buscar el funcionario por su id
    //     $funcionario = Funcionario::findOrFail($id_fun);

    //     // Obtener todos los usuarios para llenar el dropdown o la lista en la vista
    //     $users = User::all();

    //     // Pasar el funcionario y los usuarios a la vista
    //     return view('funcionarios.edit', compact('funcionario', 'users'));
    // }

    // public function update(Request $request, Funcionario $funcionario)
    // {
    //     $request->validate([
    //         'nombre_fun' => 'required|string|max:255',
    //         'user_id' => 'required|exists:users,id',
    //     ]);

    //     $funcionario->update($request->all());

    //     return redirect()->route('funcionarios.index');
    // }

    // public function destroy(Funcionario $funcionario)
    // {
    //     $funcionario->delete();

    //     return redirect()->route('funcionarios.index');
    // }

    public function index()
    {
        $funcionarios = Funcionario::all();
        return response()->json($funcionarios, 200);
    }

    public function create()
    {
        $users = User::all();
        return response()->json(['users' => $users], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_fun' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
        ]);

        $funcionario = Funcionario::create($request->all());

        return response()->json([
            'message' => 'Funcionario creado exitosamente',
            'funcionario' => $funcionario
        ], 201);
    }

    public function show($id)
    {
        $funcionario = Funcionario::find($id);
        if (!$funcionario) {
            return response()->json(['message' => 'Funcionario no encontrado'], 404);
        }
        return response()->json($funcionario, 200);
    }

    public function edit($id_fun)
    {
        $funcionario = Funcionario::findOrFail($id_fun);
        $users = User::all();

        return response()->json([
            'funcionario' => $funcionario,
            'users' => $users
        ], 200);
    }

    public function update(Request $request, $id_fun)
    {
        $request->validate([
            'nombre_fun' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
        ]);

        $funcionario = Funcionario::findOrFail($id_fun);
        $funcionario->update($request->all());

        return response()->json([
            'message' => 'Funcionario actualizado exitosamente',
            'funcionario' => $funcionario
        ], 200);
    }

    public function destroy($id)
    {
        $funcionario = Funcionario::find($id);

        if (!$funcionario) {
            return response()->json(['message' => 'Funcionario no encontrado'], 404);
        }

        $funcionario->delete();
        return response()->json(['message' => 'Funcionario eliminado correctamente']);
    }
}