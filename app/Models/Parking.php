<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Parking extends Model
{
    use HasFactory;

    // Les colonnes que tu peux remplir en masse
    protected $fillable = ['ville', 'capacite', 'prix_heure'];
    
}