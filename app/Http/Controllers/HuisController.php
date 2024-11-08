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

    $imagePath = $request->file('picture_house')->storeAs('images', $request->file('picture_house')->getClientOriginalName(), 'public');

    $validatedData['eigenaar_id'] = auth()->id(); 
    $validatedData['picture_house'] = $imagePath;
   
    Huis::create($validatedData);

    return redirect()->route('huis.create')->with('success', 'Huis succesvol toegevoegd!');
}
}
