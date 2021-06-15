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

    public function getVipTariff()
    {
        dd(__FILE__,__LINE__,auth()->user(), $currency);
        return $this->model;
    }
}
