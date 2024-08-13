<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
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
        return view('reservas.create');
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

    public function edit(Reserva $reserva)
    {
        return view('reservas.edit', compact('reserva'));
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
