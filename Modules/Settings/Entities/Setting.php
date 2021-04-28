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
     * @var string[]
     */
    protected $casts = [
        'data' => 'array',
    ];

    /**
     * @var array
     */
    protected $fillable = [
        'id','user_id','data',
    ];


    protected static function newFactory()
    {
        return \Modules\Settings\Database\factories\SettingFactory::new();
    }

    public function getTitleAttribute()
    {
        return $this->data[\LaravelLocalization::getCurrentLocale()]['site_name'];
    }

    public function getDescriptionAttribute()
    {
        return $this->data[\LaravelLocalization::getCurrentLocale()]['description'];
    }

    public function getKeywordsAttribute()
    {
        return $this->data[\LaravelLocalization::getCurrentLocale()]['keywords'];
    }


    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('logo')
            ->width(209)
            ->height(30)
            ->sharpen(10)
            ->keepOriginalImageFormat()
            ->nonOptimized();
    }
}
