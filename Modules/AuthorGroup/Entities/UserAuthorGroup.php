<?php

namespace Modules\AuthorGroup\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Modules\Users\Entities\User;

class UserAuthorGroup extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'user_id', 'group_id',
    ];

    protected $table = 'user_author_groups';
    /**
     * @return HasOne
     */
    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'user_id', 'id');
    }

    /**
     * @return HasOne
     */
    public function group(): HasOne
    {
        return $this->hasOne(AuthorGroup::class, 'group_id', 'id')->with('client');
    }

    /*protected static function newFactory()
    {
        return \Modules\AuthorGroup\Database\factories\UserAuthorGroupFactory::new();
    }*/
}
