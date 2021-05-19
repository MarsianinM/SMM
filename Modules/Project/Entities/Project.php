<?php

namespace Modules\Project\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Currency\Entities\Currency;
use Modules\ProjectLimits\Entities\ProjectLimit;
use Modules\ProjectLimits\Entities\ProjectLimitDay;
use Modules\ProjectLimits\Entities\ProjectSocialLimit;
use Modules\Rates\Entities\Rate;
use Modules\Subjects\Entities\Subject;
use Modules\Users\Entities\User;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Project extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;


    /**
     * @var array|string[]
     */
    protected $fillable = [
        'title', 'link', 'moderation_comments', 'small_comments', 'screenshot', 'user_pro', 'description', 'date_start',
        'date_finish', 'page_link', 'status', 'archive', 'pro', 'client_id', 'author_id', 'created_at', 'updated_at', 'subject_id',
        'rate_id','currency_id','group_id','author_group_id','notification','type_project','email_notifications',
    ];

    /**
     * @var array|string[]
     */
    protected $casts = [
        'email_notifications' => 'array',
    ];
    /**
     * This is language column enum from table Projects
     * @var array|string[]
     */
    protected array $languages = ['ukrainian','russian','english'];

    /**
     * This is project type column enum from table Projects
     * @var array|string[]
     */
    protected array $type_projects = ['comments','reposts','followers','videos'];

    public function getLanguagesComments(): array
    {
        return $this->languages;
    }

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

    /**
     * Get the projects for the Rates.
     */
    public function rate(): BelongsTo
    {
        return $this->belongsTo(Rate::class, 'rate_id','id')->with('rateDescription');
    }

    /**
     * Get the projects for the Rates.
     */
    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class, 'currency_id','id');
    }

    /**
     * Get the projects for the Rates.
     */
    public function group(): BelongsTo
    {
        return $this->belongsTo(ProjectGroup::class, 'group_id','id');
    }

    /**
     * Get the projects for the user.
     */
    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class, 'subject_id','id');
    }

    public function projectLimits()
    {
        return $this->hasOne(ProjectLimit::class);
    }

    public function projectLimitsDay()
    {
        return $this->hasOne(ProjectLimitDay::class);
    }

    public function projectSocialLimits()
    {
        return $this->hasOne(ProjectSocialLimit::class);
    }

    public function getTypeProjects(): array
    {
        return $this->type_projects;
    }

    /**
     * @param $value
     */
    public function setTypeProjects($value)
    {
        if(is_array($value)){
            foreach ($value as $item){
                array_push($this->type_projects, $item);
            }
        }else{
            array_push($this->type_projects, $value);
        }
    }

    /**
     * @return string
     */
    public function getDateStartAndFinishAttribute(): string
    {
        return trans('project::project.admin_ot').' '.Carbon::parse($this->date_start)->format('d-m-Y h:i').' <br> '.trans('project::project.admin_do').' '.Carbon::parse($this->date_finish)->format('d-m-Y h:i');
    }


    /**
     * @return string
     */
    public function getSmallDescriptionAttribute(): string
    {
        $description = mb_substr($this->description, 0, 200);
        if(strlen($this->description) > 200) $description .= ' ...';
        return $description;
    }

    public function getClientNameAttribute()
    {
        return $this->client->name;
    }

    public function getRateTitleAttribute()
    {
        $content = collect($this->rate->rateDescription)->keyBy('lang_key');

        return $content[config('app.locale')]->title ?? '';
    }

/*    public function getLimitsAttribute()
    {
        $limits = array();

        $limits = \Arr::add($limits, 'limits', [$this->projectLimits ?? null, $this->projectSocialLimits ?? null, $this->projectLimitsDay ?? null]);

         return collect($limits);
    }*/


    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('projects')
            ->width(120)
            ->height(120)
            ->sharpen(10)
            ->nonOptimized();
    }

    public function current()
    {
        return $this->load([
            /*'currency',*/
            'projectLimits',
            'projectLimitsDay',
            'projectSocialLimits',
        ]);
    }

}
