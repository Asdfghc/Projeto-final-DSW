<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgendaController extends Controller
{
    // Mostrar a agenda
    public function index() {
        return view('agenda/index');
    }

    
}
