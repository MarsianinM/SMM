<?php

namespace Modules\Rates\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Rate extends Model
{
    use HasFactory;

    protected $fillable = [];

    /*protected static function newFactory()
    {
        return \Modules\Rates\Database\factories\RateFactory::new();
    }*/

    public function categoryRate(): BelongsTo
    {
        return $this->belongsTo(CategoryRate::class, 'category_id', 'id');
    }

    /**
     * @return HasMany
     */
    public function rateDescription(): HasMany
    {
        return $this->hasMany(RateDescription::class, 'rate_id', 'id');
    }

    public function getCreatedDateAttribute(): string
    {
        return Carbon::parse($this->created_at)->format('d.m.Y H:i');
    }
    public function getContentCurrentLangAttribute()
    {
        $content = collect($this->rateDescription)->keyBy('lang_key');
        return $content[config('app.locale')];
    }

    public function getContentAttribute(): \Illuminate\Support\Collection
    {
        return collect($this->rateDescription)->keyBy('lang_key');
    }

}
