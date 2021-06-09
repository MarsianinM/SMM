<?php

namespace Modules\Project\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Modules\Users\Entities\User;

class ProjectInWork extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'project_in_work';

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'data' => 'array',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'project_id', 'client_id', 'author_id', 'data', 'status', 'created_at'
    ];

    protected static array $status = ['in_work','in_check','verified','rejected','refused'/*Отменен*/,'for_revision'];

    /**
     * Project find
     * @return HasOne
     */
    public function project(): HasOne
    {
        return $this->hasOne(Project::class, 'id', 'project_id');
    }

    /**
     * user client find
     * @return HasOne
     */
    public function client(): HasOne
    {
        return $this->hasOne(User::class,'id', 'client_id');
    }

    /**
     * user author find
     * @return HasOne
     */
    public function author(): HasOne
    {
        return $this->hasOne(User::class, 'id','author_id');
    }

    public static function getListStatus(): array
    {
        return self::$status;
    }
}
