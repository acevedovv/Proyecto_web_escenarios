<?php

namespace App\Http\Controllers;
use App\Models\User; 
use App\Models\Funcionario;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
     public function index()
     {
         $funcionarios = Funcionario::all();
         return view('funcionarios.index', compact('funcionarios'));
     }


     public function create()
     {
         // Obtén todos los usuarios desde la base de datos
         $users = User::all(); 

          // Pasa la variable $users a la vista 'funcionarios.create'
         return view('funcionarios.create', compact('users'));
     }

     public function store(Request $request)
     {
         $request->validate([
             'nombre_fun' => 'required|string|max:255',
             'user_id' => 'required|exists:users,id',
         ]);

         Funcionario::create($request->all());

         return redirect()->route('funcionarios.index');
     }

     public function show(Funcionario $funcionario)
     {
         return view('funcionarios.show', compact('funcionario'));
     }

     public function edit($id_fun)
     {
         // Buscar el funcionario por su id
         $funcionario = Funcionario::findOrFail($id_fun);

         // Obtener todos los usuarios para llenar el dropdown o la lista en la vista
         $users = User::all();

         // Pasar el funcionario y los usuarios a la vista
         return view('funcionarios.edit', compact('funcionario', 'users'));
     }

     public function update(Request $request, Funcionario $funcionario)
     {
         $request->validate([
             'nombre_fun' => 'required|string|max:255',
             'user_id' => 'required|exists:users,id',
         ]);

         $funcionario->update($request->all());

         return redirect()->route('funcionarios.index');
     }

     public function destroy(Funcionario $funcionario)
     {
         $funcionario->delete();

         return redirect()->route('funcionarios.index');
     }

    
}