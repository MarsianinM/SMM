<?php


namespace Modules\Project\Repository;


use Modules\Balance\Entities\Balance;

class BalanceFrontRepository
{
    /**
     * @var Balance
     */
    protected Balance $model;

    public function __construct(Balance $balance)
    {
        $this->model = $balance;
    }
}
