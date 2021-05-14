<?php

namespace Modules\ProjectLimits\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Project\Entities\Project;

class ProjectLimit extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'project_id', 'day_active', 'time_start', 'time_finish', 'max_works', 'max_works_day', 'max_works_day', 'time_off_min',
        'time_off_max', 'in_hour', 'in_page', 'in_page_on_day', 'author_count', 'author_count_on_day', 'author_count_in_group_project',
        'author_count_in_group_project_on_day', 'count_in_ip', 'max_author_work', 'time_off_in_work', 'mobile', 'stop_words'
    ];

    protected $casts = [

    ];

    protected static function newFactory()
    {
        return \Modules\ProjectLimits\Database\factories\ProjectLimitFactory::new();
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id','id');
    }
}
