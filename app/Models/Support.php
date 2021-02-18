<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Support
 *
 * @property int $id
 * @property string $theme
 * @property string $message
 * @property int|null $sender_id
 * @property int|null $receiver_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static Builder|Support newModelQuery()
 * @method static Builder|Support newQuery()
 * @method static Builder|Support query()
 * @method static Builder|Support whereCreatedAt($value)
 * @method static Builder|Support whereId($value)
 * @method static Builder|Support whereMessage($value)
 * @method static Builder|Support whereReceiverId($value)
 * @method static Builder|Support whereSenderId($value)
 * @method static Builder|Support whereTheme($value)
 * @method static Builder|Support whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Support extends Model
{
    use HasFactory;

    protected $fillable = [
        'theme', 'message', 'sender_id', 'receiver_id', 'parent_id'
    ];
}
