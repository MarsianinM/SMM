<?php

namespace Modules\UserBlackList\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Modules\Users\Entities\User;

class UserBlackList extends Model
{
    use HasFactory;

    protected $fillable = [
        'type', 'description', 'client_id', 'user_id', 'created_at', 'updated_at',
    ];

    protected array $enum = [
        'author','client','massage'
    ];

    /**
     * @return HasOne
     */
    public function client(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'client_id');
    }

    /**
     * @return HasOne
     */
    public function author(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    /**
     * @return array
     */
    public function getType(): array
    {
        return $this->enum;
    }

    public function getNameAttribute()
    {
        return $this->author->name;
    }

    /*protected static function newFactory()
    {
        return \Modules\UserBlackList\Database\factories\UserBlackListFactory::new();
    }*/
}
