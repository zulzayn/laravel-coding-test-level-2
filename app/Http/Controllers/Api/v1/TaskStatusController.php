<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskStatusStoreRequest;
use App\Http\Resources\v1\TaskResource;
use App\Models\Task;
use App\Services\TaskStatusService;
use Illuminate\Http\Request;

class TaskStatusController extends Controller
{
      /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TaskStatusStoreRequest $request, Task $task)
    {
        $validated = $request->validated();

        $task = TaskStatusService::update($validated, $task);

        return new TaskResource($task);
    }
}
