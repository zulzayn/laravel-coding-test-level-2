<?php

namespace App\Services;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Ramsey\Uuid\Uuid;

/**
 * Class FullTimeStep1Service.
 */
class TaskStatusService
{
    public static function update(Array $input, Task $task) : Task {
     
        $task->fill([
            'status' => $input['status'],
        ]);

        $task->save();
      
        return $task;
    }
}
