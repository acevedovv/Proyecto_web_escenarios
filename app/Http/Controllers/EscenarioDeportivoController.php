<?php

namespace App\Http\Controllers;

use App\Models\EscenarioDeportivo;
use Illuminate\Http\Request;

class EscenarioDeportivoController extends Controller
{
    public function index()
    {
        $escenariosDeportivos = EscenarioDeportivo::all();
        return view('escenarios_deportivos.index', compact('escenariosDeportivos'));
    }

    public function create()
    {
        return view('escenarios_deportivos.create');
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

    public function show(EscenarioDeportivo $escenarioDeportivo)
    {
        return view('escenarios_deportivos.show', compact('escenarioDeportivo'));
    }

    public function edit(EscenarioDeportivo $escenarioDeportivo)
    {
        return view('escenarios_deportivos.edit', compact('escenarioDeportivo'));
    }

    public function update(Request $request, EscenarioDeportivo $escenarioDeportivo)
    {
        $request->validate([
            'fecha_dis' => 'required|date',
            'nombre_esc' => 'required|string|max:255',
            'id_fun' => 'required|exists:funcionarios,id_fun',
        ]);

        $escenarioDeportivo->update($request->all());

        return redirect()->route('escenarios_deportivos.index');
    }

    public function destroy(EscenarioDeportivo $escenarioDeportivo)
    {
        $escenarioDeportivo->delete();

        return redirect()->route('escenarios_deportivos.index');
    }
}
