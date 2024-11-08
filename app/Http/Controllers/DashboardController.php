<?php

namespace App\Http\Controllers;
use App\Models\Afspraak;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function show()
    {
        $afspraken = Afspraak::with('huisdier')->get();

        return view('dashboard', compact('afspraken'));
    }
}
