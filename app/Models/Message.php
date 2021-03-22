<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Message
 *
 * @property int $id
 * @property string $message
 * @property int $sender_id
 * @property int $receiver_id
 * @property int $parent_id
 * @property int $read
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\MessageFactory factory(...$parameters)
 * @method static Builder|Message newModelQuery()
 * @method static Builder|Message newQuery()
 * @method static Builder|Message query()
 * @method static Builder|Message whereCreatedAt($value)
 * @method static Builder|Message whereId($value)
 * @method static Builder|Message whereMessage($value)
 * @method static Builder|Message whereParentId($value)
 * @method static Builder|Message whereRead($value)
 * @method static Builder|Message whereReceiverId($value)
 * @method static Builder|Message whereSenderId($value)
 * @method static Builder|Message whereUpdatedAt($value)
 * @mixin IdeHelperMessage
 */
class Message extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }
}
