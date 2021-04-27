<?php

namespace Modules\News\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class News extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;


    protected $table = 'news';

    protected $fillable = [
        'id', 'slug', 'sort_order', 'active'
    ];

    /**
     * @return HasMany
     */
    public function newsDescription(): HasMany
    {
        return $this->hasMany(NewDescription::class, 'new_id', 'id');
    }

    public function getContentAttribute(): \Illuminate\Support\Collection
    {
        return collect($this->newsDescription)->keyBy('lang_key');
    }

    public function getContentCurrentLangAttribute()
    {
        $content = collect($this->newsDescription)->keyBy('lang_key');
        return $content[config('app.locale')];
    }
    public function getCreatedDateAttribute(): string
    {
        return Carbon::parse($this->created_at)->format('d.m.Y H:i');
    }

    /*protected static function newFactory()
    {
        return \Modules\News\Database\factories\NewFactory::new();
    }*/
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(120)
            ->height(120)
            ->sharpen(10)
            ->nonOptimized();
    }
}
