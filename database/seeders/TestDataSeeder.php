<?php

namespace Database\Seeders;

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
        UserService::store([
            'id'       => Uuid::uuid4()->getHex(),
            'username' => 'admin',
            'password' => '123456',
            'role_id'  => 1,
        ]);

        UserService::store([
            'id'       => Uuid::uuid4()->getHex(),
            'username' => 'product_owner',
            'password' => '123456',
            'role_id'  => 2,
        ]);

        UserService::store([
            'id'       => Uuid::uuid4()->getHex(),
            'username' => 'team_member',
            'password' => '123456',
            'role_id'  => 3,
        ]);
    }
}
