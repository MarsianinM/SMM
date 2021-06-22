<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Balance
 *
 * @mixin IdeHelperBalance
 * @property int $id
 * @property string $amount
 * @property int $user_id
 * @property int $currency_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static Builder|Balance newModelQuery()
 * @method static Builder|Balance newQuery()
 * @method static Builder|Balance query()
 * @method static Builder|Balance whereAmount($value)
 * @method static Builder|Balance whereCreatedAt($value)
 * @method static Builder|Balance whereCurrencyId($value)
 * @method static Builder|Balance whereId($value)
 * @method static Builder|Balance whereUpdatedAt($value)
 * @method static Builder|Balance whereUserId($value)
 */
class Balance extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope('id', function (Builder $builder) {
            $builder->orderByDesc('created_at');
        });
    }
}
