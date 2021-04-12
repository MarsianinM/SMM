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

    protected $fillable = [
        'price_min', 'price_max', 'sort_order', 'active', 'category_id',
    ];

    /*protected static function newFactory()
    {
        return \Modules\Rates\Database\factories\RateFactory::new();
    }*/

    public function categoryRate(): BelongsTo
    {
        return $this->belongsTo(CategoryRate::class, 'category_id', 'id')->with('categoryDescription');
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
    public function getContentCurrentLangRateAttribute()
    {
        $content = collect($this->rateDescription)->keyBy('lang_key');
        return $content[config('app.locale')];
    }

    public function getContentAttribute(): \Illuminate\Support\Collection
    {
        return collect($this->rateDescription)->keyBy('lang_key');
    }

    public function getCategoryTitleAttribute()
    {
        $category = collect($this->categoryRate->categoryDescription)->keyBy('lang_key');
        return $category[config('app.locale')]->title;
    }
    public function getMinMaxPriceAdminAttribute()
    {
        $price = '';
        if($this->price_min){
            $price =  $this->price_min.' - ';
        }
        if($this->price_max > (float)$this->price_min){
            $price .=  $this->price_max;
        }else{
            $price .=  $this->price_min ?? '0';
        }
        return $price;
    }

}
