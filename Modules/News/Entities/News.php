<?php

namespace Modules\News\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class News extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    use HasFactory;

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
