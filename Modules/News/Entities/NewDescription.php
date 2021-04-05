<?php

namespace Modules\News\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NewDescription extends Model
{
    use HasFactory;

    protected $table = 'new_description';

    protected $fillable = [
        'new_id', 'lang_key', 'title', 'quote', 'content', 'alt_img', 'title_img', 'seo_title', 'seo_description', 'seo_keywords',
    ];

    /**
     * @return BelongsTo
     */
    public function news(): BelongsTo
    {
        return $this->belongsTo(News::class, 'new_id', 'id');
    }

    /*protected static function newFactory()
    {
        return \Modules\News\Database\factories\NewDescriptionFactory::new();
    }*/
}
