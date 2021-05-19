<?php

namespace Modules\ProjectLimits\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Project\Entities\Project;

class ProjectSocialLimit extends Model
{
    use HasFactory;

    protected $table = 'project_social_limits';

    protected $fillable = [
        'project_id', 'vk_check', 'vk_friends', 'vk_female', 'vk_age_min', 'vk_age_max',
        'ok_check', 'ok_friends', 'ok_female', 'ok_age_min', 'ok_age_max',
        'fb_check', 'fb_female', 'fb_age_min', 'fb_age_max',
        'inst_check', 'count_subscribers',
        'tw_check', 'count_followers',
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class, 'project_id','id');
    }
    /*protected static function newFactory()
    {
        return \Modules\ProjectLimits\Database\factories\ProjectSocialLimitFactory::new();
    }*/


}
