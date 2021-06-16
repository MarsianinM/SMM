<?php
namespace Modules\ProjectVip\Repository;

use Modules\Balance\Repository\BalanceFrontRepository;
use Modules\Project\Repository\ProjectClientRepository;
use Modules\ProjectVip\Entities\ProjectVip;
use Modules\ProjectVip\Entities\ProjectVipTariff;

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

    public function saveVip($data)
    {
         $projectVip = $this->model
                        ->where('user_id', $data['user_id'])
                        ->whereStatus('1')
                        ->where('project_id', $data['project_id'])
                        ->first();

         if(!is_null($projectVip)) return ['error' => trans('project::client.error_vip_not_null')];

         $tariff = app(ProjectVipTariffRepository::class)->model()->whereId($data['tariff_id'])->first();

         if(is_null($tariff)) return ['error' => trans('project::client.error_tariff_not_found')];

         $balance = app(BalanceFrontRepository::class)->modelBalance()->where('currency_id', $data['currency_id'])
                                                            ->where('user_id', $data['user_id'])
                                                            ->first();
         if(is_null($balance)) return ['error' => trans('project::client.error_balance_not_found')];

         if(($balance->amount - $tariff->amount) < 0) return ['error' => trans('project::client.error_not_many')];

         $project = app(ProjectClientRepository::class)->model()->whereId($data['project_id'])->where('client_id', $data['user_id'])->first();

         if(is_null($project)) return ['error' => trans('project::client.error_project_not_found')];

         $data['status'] = '1';

         $projectVipCreate = $this->model->create($data);

         if(!$projectVipCreate)  return ['error' => trans('project::client.error_vip_not_bay')];

         $nameProject = $project->title;

         $project->update(['pro' => 1]);

         return ['success' => trans('project::client.vip_success', ['PROJECT' => $nameProject])];
    }
}
