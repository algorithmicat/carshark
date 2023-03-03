<?php

namespace Database\Seeders;

use App\Models\CarModel;
use Illuminate\Database\Seeder;

class CarModelSeeder extends Seeder
{
    static $modelCars = [
        1 => ['Camry 80','Camry 70','Land Cruiser 300','Land Cruiser 200',],
        2 => ['Optima','Rio',],
        3 => ['Vesta Sport','Vesta','Granta','Largus',],
        4 => ['Grandland X','Crossland',],
        5 => ['Duster','Sandero','Arkana','Kaptur','Logan',],
        6 => ['Discovery','Range Rover Velar','Range Rover Sport','Range Rover',],
        7 => ['Golf','Touareg','Tiguan','Polo',],
        8 => ['3 series','X5','X7','i7',],
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(self::$modelCars as $marc_id => $models_car){
            foreach ($models_car as $model) {
                CarModel::create([
                    'name' => $model,
                    'marc_id' => $marc_id,
                ]);
            }
        }
    }
}
