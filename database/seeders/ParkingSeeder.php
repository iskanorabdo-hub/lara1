<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Parking;

class ParkingSeeder extends Seeder
{
    public function run(): void
    {
        Parking::factory()->count(20)->create();
        
    }
}
