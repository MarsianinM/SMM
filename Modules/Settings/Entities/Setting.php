<?php

namespace Modules\Settings\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Setting extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    /**
     * @var array
     */
    protected $fillable = [];

    /**
     * @var string[]
     */
    protected $casts = [
        'data' => 'array',
    ];

    protected static function newFactory()
    {
        return \Modules\Settings\Database\factories\SettingFactory::new();
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('logo')
            ->width(209)
            ->height(30)
            ->sharpen(10)
            ->nonOptimized();
    }
}
