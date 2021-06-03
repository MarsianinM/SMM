<?php

namespace Modules\Project\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProjectCountBay extends Model
{
    use HasFactory;

    protected $table = 'project_count_bay';

    protected $fillable = [
        'id', 'count', 'status', 'price', 'project_id',
    ];
    /**
     * Project find
     * @return BelongsTo
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class, 'project_id', 'id');
    }
    /*
    protected static function newFactory()
    {
        return \Modules\Project\Database\factories\ProjectCountBayFactory::new();
    }*/
}
