<?php
namespace Modules\ProjectVip\Repository;

use Modules\ProjectVip\Entities\ProjectVip;

class ProjectVipRepository
{
    /**
     * @var ProjectViptVip
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
