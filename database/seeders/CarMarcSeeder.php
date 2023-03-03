<?php

namespace Database\Seeders;

use App\Models\CarMarc;
use Illuminate\Database\Seeder;

class CarMarcSeeder extends Seeder
{
    static $marcs = ['Toyota', 'KIA', 'Lada', 'Opel', 'Renault', 'Land Rover', 'Volkswagen', 'BMW',];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(self::$marcs as $marc){
            CarMarc::create([
                'name' => $marc,
            ]);
        }
    }
}
