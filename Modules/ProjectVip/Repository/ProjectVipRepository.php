<?php


use Modules\ProjectVip\Entities\ProjectVip;

class ProjectVipRepository
{
    /**
     * @var ProjectVip
     */
    protected ProjectVip $model;

    public function __construct(ProjectVip $projectVip)
    {
        $this->model = $projectVip;
    }

    public function model(): ProjectVip
    {
        return $this->model;
    }
}
