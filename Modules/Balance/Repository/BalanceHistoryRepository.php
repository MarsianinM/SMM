<?php


namespace Modules\Project\Repository;


use Modules\Balance\Entities\BalanceHistory;

class BalanceHistoryRepository
{
    /**
     * @var BalanceHistory
     */
    protected BalanceHistory $model;

    public function __construct(BalanceHistory $balance_history)
    {
        $this->model = $balance_history;
    }

}
