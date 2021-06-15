<?php

namespace Modules\ProjectVip\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Modules\Project\Entities\Project;
use Modules\Users\Entities\User;

class ProjectVip extends Model
{
    use HasFactory;

    protected $table = 'project_vips';

    protected $fillable = [
        'id', 'user_id', 'tariff_id', 'status', 'created_at', 'updated_at', 'project_id',
    ];

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }

    public function tariff(): HasOne
    {
        return $this->hasOne(ProjectVipTariff::class, 'tariff_id', 'id');
    }


    public function project(): HasOne
    {
        return $this->hasOne(Project::class, 'project_id', 'id');
    }


    /*protected static function newFactory()
    {
        return \Modules\ProjectVip\Database\factories\ProjectVipFactory::new();
    }*/
}
