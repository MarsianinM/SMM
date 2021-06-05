<?php

namespace Modules\ProjectVip\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Modules\Currency\Entities\Currency;
use Modules\ProjectVip\Database\factories\ProjectVipTariffFactory;

class ProjectVipTariff extends Model
{
    use HasFactory;

    protected $table = 'project_vip_tariffs';

    protected $fillable = [
        'id', 'amount', 'currency_id', 'days', 'created_at',
    ];

    /**
     * Get the currency associated with the currency.
     */
    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    /**
     * @return HasMany
     */
    public function projectVip(): HasMany
    {
        return $this->hasMany(ProjectVip::class, 'tariff_id', 'id');
    }

    /**
     * Create a new factory instance for the model.
     * @return ProjectVipTariffFactory
     */
    protected static function newFactory(): ProjectVipTariffFactory
    {
        return ProjectVipTariffFactory::new();
    }
}
