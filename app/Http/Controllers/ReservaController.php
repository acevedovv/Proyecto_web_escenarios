<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Models\User;   
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
    // Obtener todos los usuarios
    $users = User::all();
    
    // Obtener todos los escenarios deportivos
    $escenariosDeportivos = EscenarioDeportivo::all();

    // Obtener todas las reservas existentes con la relación EscenarioDeportivo
    $reservas = Reserva::with('escenarioDeportivo')->get()->map(function ($reserva) {
        return [
            'escenario' => $reserva->escenarioDeportivo->nombre_esc,
            'fecha_res' => $reserva->fecha_res->format('Y-m-d'),
            'hora_res' => $reserva->fecha_res->format('H:i'), // Hora de inicio
            'hora_fin' => $reserva->fecha_res->addHours(2)->format('H:i'), // Añadir 2 horas a la hora de inicio
        ];
    });

    // Pasar las variables a la vista
    return view('reservas.create', compact('users', 'escenariosDeportivos', 'reservas'));
}







public function store(Request $request)
{
    // Validar los datos de la reserva
    $request->validate([
        'fecha_res' => 'required|date',
        'hora_res' => 'required|date_format:H:i',
        'user_id' => 'required|exists:users,id',
        'id_esc' => 'required|exists:escenarios_deportivos,id_esc',
    ]);

    // Combinar la fecha y la hora de inicio
    $fechaInicio = $request->fecha_res . ' ' . $request->hora_res;

    try {
        $fechaInicioCarbon = \Carbon\Carbon::createFromFormat('Y-m-d H:i', $fechaInicio);
        $fechaFin = $fechaInicioCarbon->copy()->addHours(2); // La reserva dura 2 horas

        // Verificar si ya existe una reserva en ese horario para el mismo escenario
        $conflictoReserva = Reserva::where('id_esc', $request->id_esc)
            ->where(function ($query) use ($fechaInicioCarbon, $fechaFin) {
                $query->whereBetween('fecha_res', [$fechaInicioCarbon, $fechaFin])
                      ->orWhereBetween('fecha_dev', [$fechaInicioCarbon, $fechaFin])
                      ->orWhere(function ($q) use ($fechaInicioCarbon, $fechaFin) {
                          $q->where('fecha_res', '<', $fechaFin)
                            ->where('fecha_dev', '>', $fechaInicioCarbon);
                      });
            })
            ->exists();

        if ($conflictoReserva) {
            return back()->with('error', 'No se puede reservar en este horario porque ya hay una reserva realizada.');
        }

        // Crear la reserva si no hay conflictos
        Reserva::create([
            'fecha_res' => $fechaInicioCarbon,
            'fecha_dev' => $fechaFin,
            'user_id' => $request->user_id,
            'id_esc' => $request->id_esc,
        ]);

        return redirect()->route('reservas.create')->with('success', 'Reserva realizada con éxito.');

    } catch (\Exception $e) {
        \Log::error("Error al crear la reserva: " . $e->getMessage());
        return back()->with('error', 'Error al crear la reserva. Verifica los datos ingresados.');
    }
}




    public function eventos()
{
    $reservas = Reserva::with('escenarioDeportivo')->get()->map(function ($reserva) {
        return [
            'title' => 'Reservado',  // Texto que aparecerá en el calendario
            'start' => $reserva->fecha_res . 'T' . $reserva->hora_res, // Formato ISO
            'end' => $reserva->fecha_res . 'T' . $reserva->hora_fin,   // Formato ISO
            'color' => 'red',         // Color del evento
        ];
    });

    return response()->json($reservas);
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
