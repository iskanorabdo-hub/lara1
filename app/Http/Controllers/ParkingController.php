<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parking;

class ParkingController extends Controller
{
    // Form add
    public function ajouter()
    {
        return view('parking.inserer');
    }

    // Insert data
    public function inserer(Request $r)
    {
        $r->validate([
            'ville' => 'required',
            'capacite' => 'required|numeric | min:2 |max:10000',
            'prix_heure' => 'required|numeric',
        ]);

        Parking::create($r-> except("_token"));

        return redirect()->route('liste-parking');
    }
    public function modifier($id){
        $parking = Parking::findOrFail($id);
        return view(
            view:"parking.modifier",
            data: compact('parking'));
    }
    public function enregistrer($id,request $r){
        $parking = Parking::findOrFail($id);
        $parking->update($r->except('_token'));
        return redirect("/listeparking");
    }

    // LIST + SEARCH + PAGINATION
    public function listes(Request $request)
    {
        $search = $request->search;

        $parkinges = Parking::when($search, function ($query) use ($search) {
            $query->where('ville', 'like', "%$search%");
        })->paginate(5);

        $parkinges->appends(['search' => $search]);

        return view('parking.liste', compact('parkinges'));
    }

    // SHOW
    public function showp($id)
    {
        $parking = Parking::findOrFail($id);
        return view('parking.showp', compact('parking'));
    }
    
    public function suprimer($id)
{
    $parking = Parking::findOrFail($id);
    $parking->delete();
    
    return redirect()->route('liste-parking');
}
}
