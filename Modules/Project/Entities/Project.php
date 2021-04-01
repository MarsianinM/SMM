<?php

namespace Modules\Project\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Users\Entities\User;

class Project extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected array $fillable = [
        'title', 'link', 'moderation_comments', 'small_comments', 'screenshot', 'user_pro', 'description', 'date_start',
        'date_finish', 'page_link', 'status', 'archive', 'pro', 'client_id', 'author_id', 'created_at', 'updated_at',
    ];

    protected static function newFactory()
    {
        return \Modules\Project\Database\factories\ProjectFactory::new();
    }


    /**
     * Get the projects for the user.
     */
    public function client(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(User::class, 'client_id');
        //return $this->hasMany(Project::class, $this->activeRoleIs('client') ? 'client_id' : 'author_id');
    }

    /**
     * Get the projects for the user.
     */
    public function author(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(User::class, 'author_id');
    }
}
