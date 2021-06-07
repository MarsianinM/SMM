<?php

namespace Modules\Project\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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

    protected static array $status = ['in_work','in_check','verified','rejected','refused'/*Отменен*/];

    /**
     * Project find
     * @return BelongsTo
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * user client find
     * @return BelongsTo
     */
    public function client(): BelongsTo
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    /**
     * user author find
     * @return BelongsTo
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public static function getListStatus(): array
    {
        return self::$status;
    }
}
