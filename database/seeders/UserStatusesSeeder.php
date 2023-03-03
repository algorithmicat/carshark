<?php

namespace Database\Seeders;

use App\Models\UserStatus;
use Illuminate\Database\Seeder;

class UserStatusesSeeder extends Seeder
{
    static $statuses = ['active', 'not active', 'blocked',];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(self::$statuses as $status){
            UserStatus::create([
                'user_status' => $status,
            ]);
        }
    }
}
