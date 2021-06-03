<?php


namespace Modules\Project\Repository;

use Illuminate\Http\Request;
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


        return $this->model->create($request->all());
    }

}
