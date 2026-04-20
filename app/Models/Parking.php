<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Voiture;


class Parking extends Model
{
    use HasFactory;

    // Les colonnes que tu peux remplir en masse
    protected $fillable = ['ville', 'capacite', 'prix_heure'];

    function voitures(){
        return $this->hasMany(Voiture::class);
    }
    
}