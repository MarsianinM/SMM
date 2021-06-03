<?php

namespace Modules\Balance\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BalanceHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'balance_id', 'amount', 'user_id', 'currency_id', 'payment_method', 'type', 'status', 'project_id'
    ];

    protected static function newFactory()
    {
        return \Modules\Balance\Database\factories\BalanceHistoryFactory::new();
    }
}
