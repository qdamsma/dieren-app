<?php

namespace App\Http\Controllers;

use App\Models\Huisdier;
use Illuminate\Http\Request;

class HuisdierenController extends Controller
{
    public function index() {
        $huisdieren = $this->getHuisdieren();
        return view('huisdieren.index', compact('huisdieren'));
    }

    protected function getHuisdieren() {
        return
        [
            1 => ['name' => 'Naam 1', 'phone' => '1234567890'],
            2 => ['name' => 'Naam 2', 'phone' => '0124567890'],
            3 => ['name' => 'Naam 3', 'phone' => '9014567890'],
            4 => ['name' => 'Naam 4', 'phone' => '8904567890'],
            5 => ['name' => 'Naam 5', 'phone' => '7894567890'],
            6 => ['name' => 'Naam 6', 'phone' => '6784567890'],
        ]; 
    }

    public function create() {
        return view('huisdieren.create');
    }

    public function show($id) {
        $huisdieren = $this->getHuisdieren();
        abort_unless(isset($huisdieren[$id]), 404);
        $hierdier = $huisdieren[$id];
        return view('huisdieren.show')->with('huisdier', $huisdier);
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

    return redirect()->route('huisdieren.create')->with('success', 'Huisdier successfully created!');
}
}
