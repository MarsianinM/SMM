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

        $balanceHistory = $this->setBalanceHistoryCreate($request->except('_token'),$balance);

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

    private function setBalanceHistoryCreate($data,$balance): array
    {
        $result = [];
        $result['balance_id']       = $balance->id;
        $result['amount']           = $data['amount'];
        $result['user_id']          = $data['user_id'];
        $result['currency_id']      = $data['currency_id'];
        $result['payment_method']   = $data['payment_method'];
        $result['type']             = $data['type'];
        $result['status']           = $data['status'] ?? 'rejected';//'in_processing';
        return $result;
    }

    /**
     * $data['price'] and $data['currency_id'] and $data['user_id']
     * @param $data
     * @return false
     */
    public function editBalance(array $data)
    {
        /*$price, $currency_id, $user_id = false*/
        if(is_null($data['price']) or $data['price'] == 0){
            return false;
        }

        $balance = $this->balance->where('currency_id', $data['currency_id'])->where('user_id' , $data['user_id'] ?? auth()->id())->first();
        if(!$balance) return false;

        $balance->amount -= (float)$data['price'];

        if($balance->save()){
            $balanceHistoryArray = [
                'amount'            => $data['price'],
                'user_id'           => $data['user_id'] ?? auth()->id(),
                'currency_id'       => $data['currency_id'],
                'payment_method'    => 'project_bay',
                'type'              => 'project_bay',
                'status'            => 'project_bay',
            ];

            $balanceHistory = $this->setBalanceHistoryCreate($balanceHistoryArray,$balance);

            return $this->balance_history->create($balanceHistory);
        }



    }
}
