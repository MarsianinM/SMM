<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Support
 *
 * @mixin IdeHelperSupport
 * @property int $id
 * @property string|null $theme
 * @property string $message
 * @property int $sender_id
 * @property int $receiver_id
 * @property int $parent_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\SupportFactory factory(...$parameters)
 * @method static Builder|Support newModelQuery()
 * @method static Builder|Support newQuery()
 * @method static Builder|Support query()
 * @method static Builder|Support whereCreatedAt($value)
 * @method static Builder|Support whereId($value)
 * @method static Builder|Support whereMessage($value)
 * @method static Builder|Support whereParentId($value)
 * @method static Builder|Support whereReceiverId($value)
 * @method static Builder|Support whereSenderId($value)
 * @method static Builder|Support whereTheme($value)
 * @method static Builder|Support whereUpdatedAt($value)
 */
class Support extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
}
