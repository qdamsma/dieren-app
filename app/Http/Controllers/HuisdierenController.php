<?php

namespace App\Http\Controllers;

use App\Models\Huisdier;
use Illuminate\Http\Request;

class HuisdierenController extends Controller
{
    public function create() {
        return view('huisdieren.create');
    }

    
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'age' => 'required|integer',
        'animaltype' => 'required|string|max:255',
        'note' => 'nullable|string',
    ]);

    $validatedData['eigenaar_id'] = auth()->id(); 


    Huisdier::create($validatedData);

    return redirect()->route('huisdieren.create')->with('success', 'Huisdier en huis successfully created!');
}
}
