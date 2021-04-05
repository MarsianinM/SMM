<?php

namespace Modules\Project\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Users\Entities\User;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Project extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    /**
     * @var array
     */
    protected $fillable = [
        'title', 'link', 'moderation_comments', 'small_comments', 'screenshot', 'user_pro', 'description', 'date_start',
        'date_finish', 'page_link', 'status', 'archive', 'pro', 'client_id', 'author_id', 'created_at', 'updated_at',
    ];

    protected static function newFactory()
    {
        return \Modules\Project\Database\factories\ProjectFactory::new();
    }


    /**
     * Get the projects for the user.
     */
    public function client(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'client_id','id');
        //return $this->hasMany(Project::class, $this->activeRoleIs('client') ? 'client_id' : 'author_id');
    }

    /**
     * Get the projects for the user.
     */
    public function author(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(User::class, 'author_id');
    }

    public function getDateStartAndFinishAttribute()
    {
        return trans('project::project.admin_ot').' '.Carbon::parse($this->date_start)->format('d-m-Y h:i').' <br> '.trans('project::project.admin_do').' '.Carbon::parse($this->date_finish)->format('d-m-Y h:i');
    }

    public function getSmallDescriptionAttribute()
    {
        $description = mb_substr($this->description, 0, 200);
        if(strlen($this->description) > 200) $description .= ' ...';

        return $description;
    }

    public function getClientNameAttribute()
    {

        return $this->client->name;
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('projects')
            ->width(120)
            ->height(120)
            ->sharpen(10)
            ->nonOptimized();
    }
}
