<?php


namespace Modules\Project\Repository;


use Carbon\Carbon;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Modules\Project\Entities\Project;
use Modules\Project\Entities\ProjectCountBay;
use Modules\Project\Entities\ProjectInWork;
use Str;

class ProjectAuthorRepository
{
    /**
     * @var Project
     */
    protected Project $model;

    public function __construct(Project $project)
    {
        $this->model = $project;
    }

    protected function current()
    {
        return $this->model->with([
            'client',
            'rate',
            'currency',
            'group',
            'subject',
            'projectLimits',
            'projectLimitsDay',
            'projectSocialLimits',
            'projectAuthorInWork',
            'projectCount',
        ]);
    }
//'bay_off','active','on_moderation','off','off_admins'
    public function getProjects(): LengthAwarePaginator
    {
        $sql = $this->current();
        $sql = $sql->where('status', 'active');

        $sql = $sql->whereHas('projectLimitsDay', function ($query) {
            return $query->where(strtolower(Carbon::now()->format('l')), '!=', 0);
        });
        $sql = $sql->whereHas('projectCount', function ($query) {
            return $query->where('count', '>', 0);
        });

        $sql = $sql->orderBy('pro', 'desc');
        $sql = $sql->orderBy('id', 'desc');
        return $sql->paginate(10);
    }

    /**
     * @param $project_id
     * @return Builder|Model|object|null
     */

    public function getProject($project_id)
    {
        $sql = $this->current();
        $sql = $sql->where('status', 'active');
        $sql = $sql->where('id', $project_id);
        $sql = $sql->whereHas('projectLimitsDay', function ($query) {
            return $query->where(strtolower(Carbon::now()->format('l')), '!=', 0);
        });
        $result = $sql->first();

        if(!$result) abort(404);

        if(!is_null($result->projectAuthorInWork) && $result->timer_work == 0){
            app(ProjectInWorkRepository::class)->deleted($result);
            $result->projectAuthorInWork = null;
        }
        return $result;
    }

}
