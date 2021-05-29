<?php


namespace Modules\Balance\Repository;


use Modules\Balance\Entities\Balance;
use Modules\Balance\Entities\BalanceHistory;
use Modules\Balance\Http\Requests\BalanceRequest;

class BalanceFrontRepository
{
    /**
     * @var Balance
     */
    protected Balance $balance;
    /**
     * @var BalanceHistory
     */
    protected BalanceHistory $balance_history;

    public function __construct(Balance $balance,BalanceHistory $balance_history)
    {
        $this->balance = $balance;
        $this->balance_history = $balance_history;
    }

    /**
     * @param BalanceRequest $request
     * @return BalanceHistory|false
     */
    public function save(BalanceRequest $request)
    {
        $balance = $this->balance
                ->where('user_id', $request->get('user_id'))
                ->where('currency_id', $request->get('currency_id'))
                ->first();
        $balanceNew = $this->setBalanceCreate($request,$balance);
        if(!is_null($balance)){
            $balance->update($balanceNew);
        }else{
            $balance = $this->balance->create($balanceNew);
        }
        if(!$balance) return false;

        $balanceHistory = $this->setBalanceHistoryCreate($request,$balance);

        return $this->balance_history->create($balanceHistory);
    }

    private function setBalanceCreate($request,$balance): array
    {
        $result = [];
        $result['amount'] = ($balance ? $request->get('amount') + $balance['amount'] : $request->get('amount'));
        $result['user_id'] = $request->get('user_id');
        $result['currency_id'] = $request->get('currency_id');
        return $result;
    }

    private function setBalanceHistoryCreate($request,$balance): array
    {
        $result = [];
        $result['balance_id']       = $balance->id;
        $result['amount']           = $request->get('amount');
        $result['user_id']          = $request->get('user_id');
        $result['currency_id']      = $request->get('currency_id');
        $result['payment_method']   = $request->get('payment_method');
        $result['type']             = $request->get('type');
        $result['status']           = 'rejected';//'in_processing';
        return $result;
    }
}
