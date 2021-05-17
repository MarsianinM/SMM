<?php

namespace Modules\ProjectLimits\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Project\Entities\Project;

class ProjectLimitDay extends Model
{
    use HasFactory;

    protected $table = 'project_limit_day_in_week';

    protected $fillable = ['project_id','monday','tuesday','wednesday','thursday','friday','saturday','sunday',];


    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class, 'project_id','id');
    }
   /* protected static function newFactory()
    {
        return \Modules\ProjectLimits\Database\factories\ProjectLimitDayFactory::new();
    }*/
}
