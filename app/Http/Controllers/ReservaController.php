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
        // Obtén todos los usuarios desde la base de datos
        $users = User::all();
        $escenariosDeportivos = EscenarioDeportivo::all();

        // Pasar los clientes y escenarios deportivos a la vista
        return view('reservas.create', compact('users', 'escenariosDeportivos'));
    }

    public function store(Request $request)
    {
        // Validar que se reciba la fecha y la hora
        $request->validate([
            'fecha_res' => 'required|date',
            'hora_res' => 'required|date_format:H:i',
            'user_id' => 'required|exists:users,id',
            'id_esc' => 'required|exists:escenarios_deportivos,id_esc',
        ]);
    
        // Combinar la fecha de reserva y la hora de inicio
        $fechaInicio = $request->fecha_res . ' ' . $request->hora_res;
    
        try {
            // Crear el objeto Carbon para manejar las fechas
            $fechaInicioCarbon = \Carbon\Carbon::createFromFormat('Y-m-d H:i', $fechaInicio);
            
            // Añadir 2 horas para obtener la fecha de devolución
            $fechaFin = $fechaInicioCarbon->copy()->addHours(2);
    
            // Verificar si ya existe una reserva en ese horario para el mismo escenario
            $conflictoReserva = Reserva::where('id_esc', $request->id_esc)
                ->where(function ($query) use ($fechaInicioCarbon, $fechaFin) {
                    $query->where(function ($q) use ($fechaInicioCarbon, $fechaFin) {
                        // Verificar si hay reservas que comienzan o terminan en el rango de la nueva reserva
                        $q->whereBetween('fecha_res', [$fechaInicioCarbon, $fechaFin])
                          ->orWhereBetween('fecha_dev', [$fechaInicioCarbon, $fechaFin])
                          ->orWhere(function ($q) use ($fechaInicioCarbon, $fechaFin) {
                              $q->where('fecha_res', '<', $fechaFin)
                                ->where('fecha_dev', '>', $fechaInicioCarbon);
                          });
                    });
                })
                ->exists();
    
            if ($conflictoReserva) {
                return back()->with('error', 'No se puede reservar en este horario porque ya hay una reserva realizada.');
            }
    
            // Crear la reserva si no hay conflictos de horario
            Reserva::create([
                'fecha_res' => $fechaInicioCarbon,
                'fecha_dev' => $fechaFin,
                'user_id' => $request->user_id,
                'id_esc' => $request->id_esc,
            ]);
    
            return redirect()->route('reservas.index')->with('success', 'Reserva realizada con éxito.');
    
        } catch (\Exception $e) {
            // Manejar el error y mostrar un mensaje
            \Log::error("Error al crear la reserva: " . $e->getMessage());
            return back()->with('error', 'Error al crear la reserva. Verifica los datos ingresados.');
        }
    }

    public function eventos()
{
    $reservas = Reserva::with('escenarioDeportivo') // Asegúrate de incluir la relación
        ->get()
        ->map(function($reserva) {
            return [
                'title' => 'Reservado',
                'start' => $reserva->fecha_res,
                'end' => $reserva->fecha_dev,
                'color' => 'red', // Color para el bloque reservado
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
