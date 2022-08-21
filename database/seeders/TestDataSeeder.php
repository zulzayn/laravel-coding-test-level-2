<?php

namespace Database\Seeders;

use App\Models\User;
use App\Services\UserService;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

class TestDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'id'       => 'e289b633f3a944179cdeaf7e3891f5e0',
            'username' => 'admin',
            'password' => bcrypt('123456'),
            'role_id'  => 1,
        ]);

        User::create([
            'id'       => '95dc381d979a48928b4ed8e4bed902e2',
            'username' => 'product_owner',
            'password' => bcrypt('123456'),
            'role_id'  => 2,
        ]);

        User::create([
            'id'       => '631ddd759d04487a868afdd1b7ad0cae',
            'username' => 'team_member',
            'password' => bcrypt('123456'),
            'role_id'  => 3,
        ]);
    }
}
