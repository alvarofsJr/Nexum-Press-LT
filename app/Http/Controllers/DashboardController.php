<?php

// app/Http/Controllers/DashboardController.php

namespace App\Http\Controllers;

use App\Models\Carga;
use App\Models\Motorista;
use App\Models\Veiculo;

class DashboardController extends Controller
{
    public function index()
    {

        $cargasCount = Carga::count();
        $veiculosCount = Veiculo::count();
        $motoristasCount = Motorista::count();

       
        return view('dashboard', compact('cargasCount', 'veiculosCount', 'motoristasCount'));
    }
}


