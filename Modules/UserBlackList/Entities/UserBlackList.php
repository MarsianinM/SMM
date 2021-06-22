<?php

namespace Modules\UserBlackList\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Modules\Users\Entities\User;

/**
 * Modules\UserBlackList\Entities\UserBlackList
 *
 * @property int $id
 * @property string $type
 * @property string|null $description
 * @property int $client_id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read User|null $author
 * @property-read User|null $client
 * @property-read mixed $name
 * @method static \Illuminate\Database\Eloquent\Builder|UserBlackList newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserBlackList newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserBlackList query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserBlackList whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserBlackList whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserBlackList whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserBlackList whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserBlackList whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserBlackList whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserBlackList whereUserId($value)
 * @mixin \Eloquent
 */
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
