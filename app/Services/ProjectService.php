<?php

namespace App\Services;

use App\Models\Project;
use App\Models\User;
use Ramsey\Uuid\Uuid;

/**
 * Class FullTimeStep1Service.
 */
class ProjectService
{
    public static function store(Array $input) : Project {

        $project = Project::create([
            'id'       => Uuid::uuid4()->getHex(),
            'name'     => $input['name'],
        ]);
      
        return $project;
    }
}
