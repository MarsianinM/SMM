<?php

namespace Modules\Rates\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CategoryRateDecriptions extends Model
{
    use HasFactory;

    protected $table = 'category_rate_description';

    protected $fillable = [];


    /**
     * @return BelongsTo
     */
    public function categoryRate(): BelongsTo
    {
        return $this->belongsTo(CategoryRate::class, 'category_id', 'id');
    }
    /*protected static function newFactory()
    {
        return \Modules\Rates\Database\factories\CategoryRateDecriptionsFactory::new();
    }*/
}
