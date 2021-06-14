<?php


use Modules\ProjectVip\Entities\ProjectVipTariff;

class ProjectVipTariffRepository
{
    /**
     * @var ProjectVipTariff
     */
    protected ProjectVipTariff $model;

    public function __construct(ProjectVipTariff $projectVipTariff)
    {
        $this->model = $projectVipTariff;
    }

    public function model(): ProjectVipTariff
    {
        return $this->model;
    }
}
