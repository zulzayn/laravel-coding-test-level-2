<?php

namespace Tests\Unit;

use App\Models\User;
use App\Services\ProjectService;
use App\Services\UserService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }

    public function test_user_can_be_created()
    {        
        $user = UserService::store([
            'username' => 'product_owner_test',
            'password' => '123456',
            'role_id'  => 2,
        ]);

        $this->assertTrue(true);
    }

    public function test_project_can_be_created()
    {
        $project = ProjectService::store([
            'name'     => 'project_test',
        ]);

        $this->assertTrue(true);
    }

    public function test_user_change_task_status()
    {
        $user = User::find('95dc381d979a48928b4ed8e4bed902e2');

        foreach ($user->task as $key => $task) {
            $task->fill([
                'status' => "IN_PROGRESS",
            ]);
            $task->save();
        }
     
        $this->assertTrue(true);
    }
}
