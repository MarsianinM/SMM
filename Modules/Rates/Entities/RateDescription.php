<?php

namespace Modules\Rates\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RateDescription extends Model
{
    use HasFactory;

    protected $table = 'rate_description';

    protected $fillable = [
        'rate_id', 'lang_key', 'title', 'description', 'help_text',
    ];

   /* protected static function newFactory()
    {
        return \Modules\Rates\Database\factories\RateDescriptionFactory::new();
    }*/


    public function rate(): BelongsTo
    {
        return $this->belongsTo(Rate::class, 'rate_id', 'id');
    }

}
