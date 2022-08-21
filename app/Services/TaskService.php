<?php

namespace App\Services;

use App\Models\Role;
use App\Models\Task;
use Ramsey\Uuid\Uuid;

/**
 * Class FullTimeStep1Service.
 */
class TaskService
{
    public static function store(Array $input, Task $task = null) : Task {

        if(!$task) {
            $task = Task::create([
                'id'       => Uuid::uuid4()->getHex(),
                'title' => $input['title'],
                'description' => $input['description'],
                'status' => Task::STATUS['NOT_STARTED'],
                'project_id' => $input['project_id'],
                'user_id'  => $input['user_id'],
            ]);
        } else {
            $task->fill([
                'title' => $input['title'],
                'description' => $input['description'],
                'project_id' => $input['project_id'],
                'user_id'  => $input['user_id'],
            ]);
            $task->save();
        }
      
        return $task;
    }
}
