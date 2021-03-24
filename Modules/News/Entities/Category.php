<?php

namespace Modules\News\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Category extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [];

    protected static function newFactory()
    {
        return \Modules\News\Database\factories\CategoryFactory::new();
    }
}
