<?php

namespace Modules\ProjectGroup\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Project\Entities\Project;

class ProjectGroup extends Model
{
    use HasFactory;

    protected $table = 'project_group';

    protected $fillable = ['name','parent_id','show','show_children_group','user_id'];

    protected static function newFactory()
    {
       // return \Modules\Project\Database\factories\ProjectGroupFactory::new();
    }

    /**
     * @return HasMany
     */
    public function child(): HasMany
    {
        return $this->hasMany(self::class, 'parent_id', 'id');
    }

    /**
     * @return HasMany
     */
    public function project(): HasMany
    {
        return $this->hasMany(Project::class, 'group_id', 'id');
    }

    /**
     * @return int
     */
    public function getCountProjectAttribute(): int
    {
        return Project::query()->whereIn('group_id', $this->child()->get(['id'])->pluck('id')->toArray())->count();
    }
}
