<?php

namespace App\Http\Controllers;
use App\Models\EscenarioDeportivo; // Asegúrate de importar el modelo

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $escenarios = EscenarioDeportivo::all(); // Obtener todos los escenarios deportivos

        return view('home', compact('escenarios')); // Pasar los escenarios a la vista
    }
}
