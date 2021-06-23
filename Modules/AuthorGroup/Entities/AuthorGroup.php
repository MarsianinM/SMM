<?php

namespace Modules\AuthorGroup\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Modules\Project\Entities\Project;
use Modules\Users\Entities\User;

class AuthorGroup extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'client_id', 'name', 'description', 'created_at', 'updated_at',
    ];

    protected $table = 'author_groups';

    /**
     * @return HasOne
     */
    public function client(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'client_id');
    }

    /**
     * @return HasMany
     */
    public function userGroup(): HasMany
    {
        return $this->hasMany(UserAuthorGroup::class, 'group_id','id')->with('user');
    }

    public function projects()
    {
        return $this->hasMany(Project::class, 'author_group_id', 'id');
    }

    public function getCountProjectAttribute()
    {
        return $this->projects->count();
    }

    /*protected static function newFactory()
    {
        return \Modules\AuthorGroup\Database\factories\AuthorGroupFactory::new();
    }*/
}
