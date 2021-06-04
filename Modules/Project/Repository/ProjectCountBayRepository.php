<?php


namespace Modules\Project\Repository;


use Modules\Balance\Repository\BalanceFrontRepository;
use Modules\Project\Entities\Project;
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
     * @param ProjectClientRepository $projectClientRepository
     * @param BalanceFrontRepository $balance
     * @return mixed
     */
    public function save(array $data)
    {

        $project = app(ProjectClientRepository::class)->model()->where('id',$data['project_id'])->first();

        $balance = [
            'project_id'        => $data['project_id'],
            'price'             => $data['price']*$data['count'],
            'currency_id'       => $project->currency_id,
            'user_id'           => auth()->id(),
        ];

        $balanceFrontRepository = app(BalanceFrontRepository::class);
        $balanceFront = $balanceFrontRepository->getBalance()
            ->where('currency_id', $balance['currency_id'])
            ->where('user_id' , $data['user_id'] ?? auth()->id())
            ->first();

        if($balanceFront->amount < $balance['price']){
            return  ['error' => trans('balance::balance.error_max_sum')];
        }

        $projectbay = $this->model->where('project_id',$data['project_id'])
                                ->whereStatus('1')->first();


        $project->update([
            'price'     => $data['price'],
            'status'    => 'active',
        ]);

        $balanceEdit = $balanceFrontRepository->editBalance($balance,$balanceFront);

        if(!$balanceEdit) return ['error' => trans('balance::balance.error_edit_balance')];

        if($projectbay){
            $data['count'] += $projectbay->count;
            return $projectbay->update($data);
        }
        return $this->model->create($data);
    }
}
