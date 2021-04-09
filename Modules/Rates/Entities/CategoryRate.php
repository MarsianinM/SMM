<?php

namespace Modules\Rates\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
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
    protected $fillable = [];

    /*protected static function newFactory()
    {
        return \Modules\Rates\Database\factories\CategoryRateFactory::new();
    }*/

    /**
     * @return HasMany
     */
    public function categoryDescription(): HasMany
    {
        return $this->hasMany(CategoryRateDecriptions::class, 'category_id', 'id');
    }

}
