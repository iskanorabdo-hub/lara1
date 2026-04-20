<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Parking;


class Voiture extends Model
{
    use HasFactory;

    protected $fillable = ['marque', 'model', 'km' , 'parking_id'];
    
 function parking(){
        return $this->belongsTo(Parking::class);
    }
   
    }