<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\ProjectStoreRequest;
use App\Http\Resources\v1\ProjectResource;
use App\Models\Project;
use App\Services\ProjectService;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $projects = Project::where('name', 'like', '%' . $request->q . '%')
                            ->orderBy(''.$request->sortBy ? $request->sortBy : 'name'.'' , ''.$request->sortDirection ? $request->sortDirection : 'ASC'.'')
                            ->paginate($request->pageSize ? $request->pageSize : 3);

        return ProjectResource::collection($projects);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectStoreRequest $request)
    {
        $validated = $request->validated();

        $project = ProjectService::store($validated);

        return new ProjectResource($project);
    }

}
