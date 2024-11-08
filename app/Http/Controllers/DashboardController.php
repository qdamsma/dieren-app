<?php

namespace App\Http\Controllers;
use App\Models\Afspraak;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function show(Request $request)
    {

        $uurtarief = $request->input('uurtarief');

        $query = Afspraak::with('huisdier');

        if ($uurtarief) {
            $query->where('uurtarief', '>', $uurtarief);
        }

        $afspraken = $query->get();

        return view('dashboard', compact('afspraken'));
    }
}
