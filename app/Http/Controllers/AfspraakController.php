<?php

namespace App\Http\Controllers;

use App\Models\Afspraak;
use App\Models\Huis;
use App\Models\Huisdier;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AfspraakController extends Controller
{
    public function create()
    {
        $huisdieren = Huisdier::where('eigenaar_id', Auth::id())->get();
        $huizen = Huis::where('eigenaar_id', Auth::id())->get();

        if ($huisdieren->isEmpty()) {
            return redirect()->route('huisdieren.create')->with('error', 'Je moet eerst een huisdier aanmaken!');
        }

        if ($huizen->isEmpty()) {
            return redirect()->route('huis.create')->with('error', 'Je moet eerst een huis aanmaken!');
        }

        return view('afspraken.create', compact('huisdieren', 'huizen'));
    }

    public function store(Request $request)
    {
        // Valideer de gegevens van de afspraak
        $validatedData = $request->validate([
            'huisdier_id' => 'required|exists:huisdier,id',
            'huis_id' => 'required|exists:huizen,id',
            'start_datum' => 'required|date',
            'eind_datum' => 'required|date',
            'tijd_start' => 'required|date_format:H:i',
            'tijd_eind' => 'required|date_format:H:i',
            'uurtarief' => 'required|numeric',
            'opmerkingen' => 'nullable|string',
        ]);

        // Voeg de eigenaar_id toe aan de gevalideerde gegevens
        $validatedData['eigenaar_id'] = Auth::id();

        // Maak de nieuwe afspraak aan
        Afspraak::create($validatedData);

        return redirect()->route('afspraak.create')->with('success', 'Afspraak succesvol aangemaakt!');
    }
    public function show($id)
    {
         $afspraak = Afspraak::with('huisdier')->findOrFail($id);

         return view('afspraken.show', compact('afspraak'));
    }

public function storeReview(Request $request, $afspraakId)
{
    $validatedData = $request->validate([
        'review' => 'required|string|max:1000',
        'rating' => 'nullable|integer|between:1,5',
    ]);

    $afspraak = Afspraak::find($afspraakId);

    Review::create([
        'afspraak_id' => $afspraak->id,
        'review' => $validatedData['review'],
        'rating' => $validatedData['rating'], 
    ]);

    return redirect()->route('afspraak.show', $afspraak->id)->with('success', 'Review succesvol toegevoegd!');
}

public function aanvraag(Request $request, $id)
{
    $afspraak = Afspraak::findOrFail($id);
    $afspraak->status = 'aangevraagd';
    $afspraak->save();

    return redirect()->route('dashboard')->with('status', 'Afspraak is aangevraagd. Wacht op goedkeuring van de eigenaar.');
}
public function accept($id)
{
    $afspraak = Afspraak::findOrFail($id);
    $afspraak->status = 'geaccepteerd';
    $afspraak->save();

    return redirect()->route('dashboard')->with('status', 'Afspraak is goedgekeurd.');
}

public function weiger($id)
{
    $afspraak = Afspraak::findOrFail($id);
    $afspraak->status = 'geweigerd';
    $afspraak->save();

    return redirect()->route('dashboard')->with('status', 'Afspraak is geweigerd.');
}
public function destroy($id) {
    $afspraak = Afspraak::findOrFail($id);
    $afspraak->delete();
    return redirect()->back()->with('status', 'Afspraak is verwijderd.');
}
}
