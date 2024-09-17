<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use App\Models\EscenarioDeportivo;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class EscenarioDeportivoController extends Controller
{
    public function index()
    {
        $escenariosDeportivos = EscenarioDeportivo::all();
        return view('escenarios_deportivos.index', compact('escenariosDeportivos'));
    }

    public function generarPDF()
    {
        $escenariosDeportivos = EscenarioDeportivo::all();
        $pdf = Pdf::loadView('escenarios_deportivos.download', compact('escenariosDeportivos'));
        return $pdf->download('escenarios_deportivos.pdf');
    }

    public function create()
    {
        $funcionarios = Funcionario::all(); // Obtén todos los funcionarios
        return view('escenarios_deportivos.create', compact('funcionarios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'fecha_dis' => 'required|date',
            'nombre_esc' => 'required|string|max:255',
            'id_fun' => 'required|exists:funcionarios,id_fun',
        ]);

        EscenarioDeportivo::create($request->all());

        return redirect()->route('escenarios_deportivos.index');
    }

    public function show($id)
    {
        // Encuentra el escenario deportivo por su ID
        $escenarioDeportivo = EscenarioDeportivo::findOrFail($id);
        // Pasar el modelo a la vista
        return view('escenarios_deportivos.show', compact('escenarios'));
    }

    public function edit($id)
    {
        // Encuentra el escenario deportivo por su ID
        $escenarioDeportivo = EscenarioDeportivo::findOrFail($id);

        // Obtén todos los funcionarios para llenar el dropdown o la lista en la vista
        $funcionarios = Funcionario::all();

        // Pasa el escenario deportivo y los funcionarios a la vista
        return view('escenarios_deportivos.edit', compact('escenarioDeportivo', 'funcionarios'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'fecha_dis' => 'required|date',
            'nombre_esc' => 'required|string|max:255',
            'id_fun' => 'required|exists:funcionarios,id_fun',
        ]);

        $escenarioDeportivo = EscenarioDeportivo::findOrFail($id);
        $escenarioDeportivo->update($request->all());

        return redirect()->route('escenarios_deportivos.index')->with('success', 'Escenario Deportivo actualizado correctamente.');
    }

    public function destroy($id)
    {
        $escenarioDeportivo = EscenarioDeportivo::findOrFail($id);
        $escenarioDeportivo->delete();

        return redirect()->route('escenarios_deportivos.index')->with('success', 'Escenario Deportivo eliminado correctamente.');
    }
}
