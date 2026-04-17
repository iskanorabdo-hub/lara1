<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Voiture;

class VoitureController extends Controller
{
    public function listes(){
        $voitures = Voiture::all();
        return view('voiture.listes', compact('voitures'));
    }
   public function show($id){
    $voiture = Voiture::findOrFail($id);
    return view('voiture.show', compact('voiture'));
}
}
