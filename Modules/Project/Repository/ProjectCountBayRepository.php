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
        /*
         $data [
              "project_id" => "9",
              "count" => "4",
              "price" => "6.00"
            ];
         */
        $projectbay = $this->model->where('project_id',$data['project_id'])
                                ->whereStatus('1')->first();

        $project = app(ProjectClientRepository::class)->model()->where('id',$data['project_id'])->first();

        $project->update([
            'price'     => $data['price'],
            'status'    => 'active',
        ]);

        $balance = [
            'price'             => $data['price']*$data['count'],
            'currency_id'       => $project->currency_id,
            'user_id'           => auth()->id(),
        ];
        app(BalanceFrontRepository::class)->editBalance($balance);
        if($projectbay){
            $data['count'] += $projectbay->count;
            return $projectbay->update($data);
        }
        return $this->model->create($data);
    }
}
