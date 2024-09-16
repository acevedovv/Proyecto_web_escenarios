<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Models\User;   
use App\Models\EscenarioDeportivo;  
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class ReservaController extends Controller
{
    public function index()
    {
        $reservas = Reserva::all();
        return view('reservas.index', compact('reservas'));
    }
    
    //Implementación de la descarga de PDF en la vista de reservas
    public function generarPDF()
    {
        $reservas = Reserva::all();
        $pdf = PDF::loadView('reservas.download', compact('reservas'));
        return $pdf->download('reservas.pdf');
    }

    public function create()
    {
        // Obtén todos los usuarios desde la base de datos
        $users = User::all();
        $escenariosDeportivos = EscenarioDeportivo::all();

        // Pasar los clientes y escenarios deportivos a la vista
        return view('reservas.create', compact('users', 'escenariosDeportivos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'fecha_res' => 'required|date',
            'fecha_dev' => 'required|date|after:fecha_res',
            'user_id' => 'required|exists:users,id',
            'id_esc' => 'required|exists:escenarios_deportivos,id_esc',
        ]);

        Reserva::create($request->all());

        return redirect()->route('reservas.index');
    }

    public function show($id)
    {
        $escenarioDeportivo = EscenarioDeportivo::find($id);
        return view('reservas.show', compact('escenarioDeportivo'));
    }
    

    public function edit($id)
    {
        // Obtén la reserva que se va a editar
        $reserva = Reserva::findOrFail($id);

        // Obtener todos los usuarios para llenar el dropdown o la lista en la vista
        $users = User::all();

        // Obtén todos los escenarios deportivos
        $escenariosDeportivos = EscenarioDeportivo::all();

        // Pasa la reserva, los clientes y los escenarios deportivos a la vista
        return view('reservas.edit', compact('reserva', 'users', 'escenariosDeportivos'));
    }

    public function update(Request $request, Reserva $reserva)
    {
        $request->validate([
            'fecha_res' => 'required|date',
            'fecha_dev' => 'required|date|after:fecha_res',
            'user_id' => 'required|exists:users,id',
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
