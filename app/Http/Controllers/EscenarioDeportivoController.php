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
        'fecha_res' => 'required|date',
        'hora_inicio' => 'required|date_format:H:i',
        'user_id' => 'required|exists:users,id',
        'id_esc' => 'required|exists:escenarios_deportivos,id_esc',
    ]);

    // Combina la fecha con la hora para crear un datetime
    $fechaInicio = $request->fecha_res . ' ' . $request->hora_inicio;
    $fechaFin = \Carbon\Carbon::parse($fechaInicio)->addHours(2); // Añade 2 horas

    // Validar que no haya una reserva existente para el mismo escenario y en el mismo horario
    $conflictoReserva = Reserva::where('id_esc', $request->id_esc)
        ->where(function($query) use ($fechaInicio, $fechaFin) {
            $query->whereBetween('fecha_res', [$fechaInicio, $fechaFin])
                  ->orWhereBetween('fecha_dev', [$fechaInicio, $fechaFin]);
        })
        ->exists();

    if ($conflictoReserva) {
        return back()->with('error', 'Este escenario ya está reservado para las fechas seleccionadas.');
    }

    // Crear la reserva si no hay conflictos de horario
    Reserva::create([
        'fecha_res' => $fechaInicio, // Guarda la fecha y hora de inicio
        'fecha_dev' => $fechaFin, // Guarda la fecha y hora de finalización
        'user_id' => $request->user_id,
        'id_esc' => $request->id_esc,
    ]);

    return redirect()->route('reservas.index')->with('success', 'Reserva realizada con éxito.');
}



     public function show($id)
     {
          //Encuentra el escenario deportivo por su ID
         $escenarioDeportivo = EscenarioDeportivo::findOrFail($id);
          //Pasar el modelo a la vista
         return view('escenarios_deportivos.show', compact('escenarios'));
     }

     public function edit($id)
     {
          //Encuentra el escenario deportivo por su ID
         $escenarioDeportivo = EscenarioDeportivo::findOrFail($id);

         // Obtén todos los funcionarios para llenar el dropdown o la lista en la vista
         $funcionarios = Funcionario::all();

        //  Pasa el escenario deportivo y los funcionarios a la vista
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


