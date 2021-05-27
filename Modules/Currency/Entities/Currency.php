<?php

namespace Modules\Currency\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Balance\Entities\Balance;
use Modules\Project\Entities\Project;

class Currency extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'currency';

    protected $fillable = ['title','code', 'symbol', 'decimal_place', 'value', 'status', 'activate', 'sort'];

    protected static function newFactory()
    {
        return \Modules\Currency\Database\factories\CurrencyFactory::new();
    }
    /**
     * @return HasMany
     */
    public function project(): HasMany
    {
        return $this->hasMany(Project::class, 'currency_id', 'id');
    }
    /**
     * Get the balances for the user.
     */
    public function balances(): HasMany
    {
        return $this->hasMany(Balance::class);
    }
}
