<?php


namespace Modules\Project\Repository;


use Modules\Project\Entities\ProjectCountBay;

class ProjectCountBayRepository
{
    /**
     * @var ProjectCountBay
     */
    protected ProjectCountBay $model;

    public function __construct(ProjectCountBay $ProjectCountBay)
    {
        $this->model = $ProjectCountBay;
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function save(array $data)
    {
        $project = $this->model->where('project_id',$data['project_id'])
                                ->whereStatus('1')->first();
        if($project){
            $data['count'] += $project->count;
            return $project->update($data);
        }
        return $this->model->create($data);
    }
}
