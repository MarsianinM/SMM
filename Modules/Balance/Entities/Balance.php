<?php

namespace Modules\Balance\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Currency\Entities\Currency;
use Modules\Users\Entities\User;

class Balance extends Model
{
    use HasFactory;

    protected $table = 'balances';

    protected $fillable = [
        'id', 'amount', 'user_id', 'currency_id', 'created_at', 'updated_at'
    ];

   /* protected static function newFactory()
    {
        return \Modules\Balance\Database\factories\BalanceFactory::new();
    }*/

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class);
    }
}
