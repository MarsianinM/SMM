<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Blacklist
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static Builder|Blacklist newModelQuery()
 * @method static Builder|Blacklist newQuery()
 * @method static Builder|Blacklist query()
 * @method static Builder|Blacklist whereCreatedAt($value)
 * @method static Builder|Blacklist whereId($value)
 * @method static Builder|Blacklist whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Blacklist extends Model
{
    use HasFactory;
}
