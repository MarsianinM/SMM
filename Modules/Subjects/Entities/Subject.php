<?php

namespace Modules\Subjects\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Project\Entities\Project;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'title', 'active',
    ];

    protected $casts = [
        'title' => 'array',
        'active' => 'boolean',
    ];

    protected static function newFactory()
    {
        return \Modules\Subjects\Database\factories\SubjectFactory::new();
    }

    public function project(): HasMany
    {
        return $this->hasMany(Project::class, 'subject_id', 'id');
    }

    public function getSubjectTitleCurrentLangAttribute()
    {
        return $this->title[config('app.locale')];
    }

    public function getCreatedDateAttribute(): string
    {
        return Carbon::parse($this->created_at)->format('d.m.Y H:i');
    }
}
