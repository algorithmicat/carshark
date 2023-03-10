<?php

namespace Database\Seeders;

use App\Models\CarMark;
use Illuminate\Database\Seeder;

class CarMarkSeeder extends Seeder
{
    static $marks = ['Toyota', 'KIA', 'Lada', 'Opel', 'Renault', 'Land Rover', 'Volkswagen', 'BMW',];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(self::$marks as $mark){
            CarMark::create([
                'name' => $mark,
            ]);
        }
    }
}
