<?php

namespace Modules\Rates\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;
use Modules\News\Entities\NewDescription;

class CategoryRate extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'category_rates';

    /**
     * @var array
     */
    protected $fillable = [
        'id', 'slug', 'sort_order', 'active', 'parent_id',
    ];

    /**
     * @return HasMany
     */
    public function categoryDescription(): HasMany
    {
        return $this->hasMany(CategoryRateDecriptions::class, 'category_id', 'id');
    }

    /**
     * @return HasMany
     */
    public function children(): HasMany
    {
        return $this->hasMany(self::class, 'parent_id', 'id');
    }
    /**
     * @return HasMany
     */
    public function rates(): HasMany
    {
        return $this->hasMany(Rate::class, 'category_id', 'id');
    }

    /**
     * @return string
     */
    public function getCreatedDateAttribute(): string
    {
        return Carbon::parse($this->created_at)->format('d.m.Y H:i');
    }

    /**
     * @return mixed
     */
    public function getContentCurrentLangAttribute()
    {
        $content = collect($this->categoryDescription)->keyBy('lang_key');

        return $content[config('app.locale')] ?? false;
    }

    /**
     * @return Collection
     */
    public function getContentAttribute(): Collection
    {
        return collect($this->categoryDescription)->keyBy('lang_key');
    }

}
