<?php

namespace Modules\Project\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProjectGroup extends Model
{
    use HasFactory;

    protected $fillable = ['name','parent_id','show','show_children_group'];

    protected static function newFactory()
    {
        return \Modules\Project\Database\factories\ProjectGroupFactory::new();
    }

    public function child()
    {
        return $this->hasMany(self::class, 'parent_id', 'id');
    }
}
