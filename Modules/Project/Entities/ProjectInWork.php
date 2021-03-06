<?php

namespace Modules\Project\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Modules\Users\Entities\User;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ProjectInWork extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;
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

    protected static array $status = [
        'in_work',//В работе
        'in_check',//На проверке
        'verified',//Принят
        'rejected',//отклоненн
        'refused'/*Отменен*/,
        'for_revision'//на доработку
    ];

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


    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('project_in_work');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->width(280)->height(350);
        $this->addMediaConversion('large')->width(1024)->height(1024);
    }
}
