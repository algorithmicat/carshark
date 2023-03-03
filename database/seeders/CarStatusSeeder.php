<?php

namespace Database\Seeders;

use App\Models\CarStatus;
use Illuminate\Database\Seeder;

class CarStatusSeeder extends Seeder
{
    static $statuses = ['Open', 'Blocked', 'Frozen', 'Closed',];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(self::$statuses as $status){
            CarStatus::create([
                'car_status' => $status,
            ]);
        }
    }
}
