<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReporteController extends Controller
{
    public function create()
    {
        // Retornar la vista de creación de reportes
        return view('reportes.create');
    }
}
