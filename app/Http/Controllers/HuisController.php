<?php

namespace App\Http\Controllers;

use App\Models\Huis;
use Illuminate\Http\Request;

class HuisController extends Controller
{
    public function create() {
        return view('huizen.create');
    }

    
    public function store(Request $request)
{

    $validatedData = $request->validate([
        'address' => 'required|string|max:255',
        'city' => 'required|string|max:255',
        'picture_house' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    if ($request->hasFile('picture_house')) {
        $image = $request->file('picture_house');
        $path = $image->store('house_pictures', 'public'); // Sla op in de map 'house_pictures' in de 'public' opslag
        $validatedDatahuis['picture_house'] = $path;
    }

    $validatedData['eigenaar_id'] = auth()->id(); 
   
    Huis::create($validatedData);

    return redirect()->route('huis.create')->with('success', 'Huis succesvol toegevoegd!');
}
}
