<?php
namespace Modules\ProjectVip\Repository;

use Modules\Currency\Entities\Currency;
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

    public function getVipTariff($currency_id = false)
    {
        if(!$currency_id){
            $currency = Currency::where('status', '1')->first('id');
        }else{
            $currency = Currency::where('id', $currency_id)->first('id');
        }

        if(is_null($currency)) return false;

        return $this->model->where('currency_id',$currency->id)->get();
    }
}
