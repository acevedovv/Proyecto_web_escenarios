<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Models\Cliente;  
use App\Models\EscenarioDeportivo;  
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    public function index()
    {
        $reservas = Reserva::all();
        return view('reservas.index', compact('reservas'));
    }

    public function create()
    {
        // Obtener todos los clientes y escenarios deportivos
        $clientes = Cliente::all();
        $escenariosDeportivos = EscenarioDeportivo::all();

        // Pasar los clientes y escenarios deportivos a la vista
        return view('reservas.create', compact('clientes', 'escenariosDeportivos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'fecha_res' => 'required|date',
            'fecha_dev' => 'required|date|after:fecha_res',
            'id_cli' => 'required|exists:clientes,id_cli',
            'id_esc' => 'required|exists:escenarios_deportivos,id_esc',
        ]);

        Reserva::create($request->all());

        return redirect()->route('reservas.index');
    }

    public function show(Reserva $reserva)
    {
        return view('reservas.show', compact('reserva'));
    }

    public function edit($id)
    {
        // Obtén la reserva que se va a editar
        $reserva = Reserva::findOrFail($id);

        // Obtén todos los clientes
        $clientes = Cliente::all();

        // Obtén todos los escenarios deportivos
        $escenariosDeportivos = EscenarioDeportivo::all();

        // Pasa la reserva, los clientes y los escenarios deportivos a la vista
        return view('reservas.edit', compact('reserva', 'clientes', 'escenariosDeportivos'));
    }

    public function update(Request $request, Reserva $reserva)
    {
        $request->validate([
            'fecha_res' => 'required|date',
            'fecha_dev' => 'required|date|after:fecha_res',
            'id_cli' => 'required|exists:clientes,id_cli',
            'id_esc' => 'required|exists:escenarios_deportivos,id_esc',
        ]);

        $reserva->update($request->all());

        return redirect()->route('reservas.index');
    }

    public function destroy(Reserva $reserva)
    {
        $reserva->delete();

        return redirect()->route('reservas.index');
    }
}
