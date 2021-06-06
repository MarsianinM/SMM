<?php


namespace Modules\Project\Repository;

use Illuminate\Http\Request;
use Modules\Project\Entities\Project;
use Modules\Project\Entities\ProjectCountBay;
use Modules\Project\Entities\ProjectInWork;

class ProjectInWorkRepository
{
    /**
     * @var ProjectInWork
     */
    protected ProjectInWork $model;

    public function __construct(ProjectInWork $project)
    {
        $this->model = $project;
    }

    public function add(Request $request)
    {
        $project = ProjectCountBay::where('project_id',$request->get('project_id'))->first();

        if(empty($project->count) or $project->count < 1) return ['error' => trans('project::author.error_project_count')];

        $project->count -= 1;
        if(!$project->update()) return ['error' => trans('project::author.error_project_update')];

        return $this->model->create($request->all());
    }

}
