<?php

namespace Modules\Project\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
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
    use HasFactory, InteractsWithMedia, SoftDeletes;

    /**
     * @var array|string[]
     */
    protected $fillable = [
        'title', 'link', 'moderation_comments', 'small_comments', 'screenshot', 'user_pro', 'description', 'date_start',
        'date_finish', 'page_link', 'status', 'archive', 'pro', 'client_id', 'author_id', 'created_at', 'updated_at', 'subject_id',
        'rate_id','currency_id','group_id','author_group_id','notification','type_project','email_notifications','price','language',
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
     * Get the projects for the status in author.
     */
    public function projectAuthor(): BelongsTo
    {
        return $this->belongsTo(ProjectInWork::class, 'id','project_id');
    }
    /**
     * Get the projects for the status in author.
     */
    public function projectAuthorInWork(): BelongsTo
    {
        return $this->belongsTo(ProjectInWork::class, 'id','project_id')->where('author_id',auth()->id());
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
     * Get the projects for the Rates.
     */
    public function projectCount(): BelongsTo
    {
        return $this->belongsTo(ProjectCountBay::class, 'id','project_id')->where('status', '1');
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
        $description = mb_substr($this->description, 0, 100);
        if(strlen($this->description) > 100) $description .= ' ...';
        return $description;
    }

    public function getClientNameAttribute()
    {
        return $this->client->name;
    }

    /**
     * @return string
     */
    public function getCountBayAttribute()
    {
        if(is_null($this->projectCount)) return "0";
        return $this->projectCount->count;
    }

    public function getRateTitleAttribute()
    {
        $content = collect($this->rate->rateDescription)->keyBy('lang_key');

        return $content[config('app.locale')]->title ?? '';
    }

    /**
     * @return bool
     */
    public function getIsWorkAuthorAttribute(): bool
    {
        return (is_null($this->projectAuthorInWork) ? false : true);
    }

    /**
     * @return bool
     */
    public function getTimerWorkAttribute(): bool|int
    {
        if(is_null($this->projectAuthorInWork)){
            return false;
        }

        $milisecond = Carbon::parse($this->projectAuthorInWork->created_at)->addMinutes(25)->timestamp - Carbon::now()->timestamp;

        if($milisecond < 0 ){
            $milisecond = 0;
        }

        return $milisecond;
    }

    public function getClassCssAttribute(): string
    {
        $class = 'green__project';
        switch ($this->status) {
            case 'on_moderation':
            case 'bay_off':
                $class = 'yellow__project';
                break;
            case 'completed':
                $class =  "blue__project";
                break;
            case 'active':
                $class =  "green__project";
                break;
            case 'off':
            case 'off_admins':
                $class =  "red__project";
                break;
        }
        return $class;
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
            'currency',
            'projectLimits',
            'projectLimitsDay',
            'projectSocialLimits',
        ]);
    }

}
