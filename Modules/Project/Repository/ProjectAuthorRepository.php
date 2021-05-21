<?php


namespace Modules\Project\Repository;


use Carbon\Carbon;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Modules\Project\Entities\Project;
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
//'bay_off','active','on_moderation','off','off_admins'
    public function getProjects(): LengthAwarePaginator
    {
        $sql = $this->model->with([
            'client',
            'rate',
            'currency',
            'group',
            'subject',
            'projectLimits',
            'projectLimitsDay',
            'projectSocialLimits',
        ]);
        $sql = $sql->where('status', 'active');

        $sql = $sql->whereHas('projectLimitsDay', function ($query) {
            $result = $query->where(strtolower(Carbon::now()->format('l')), '!=', 0);
            return $result;
        });
       /* $sql = $sql->whereHas('projectLimits', function ($query) {
            $result = $query->where('time_start', '>=', Carbon::now('Europe/Stockholm')->format('H:i:s'))
                ->where('time_finish', '<=', Carbon::now('Europe/Stockholm')->format('H:i:s'));
            return $result;
        });*/

        $sql = $sql->orderBy('pro', 'desc');
        $sql = $sql->orderBy('id', 'desc');
        return $sql->paginate(10);
    }

    /**
     * @param $project_id
     * @return Project
     */

    public function getProject($project_id): Project
    {

        $sql = $this->model->with([
            'client',
            'rate',
            'currency',
            'group',
            'subject',
            'projectLimits',
            'projectLimitsDay',
            'projectSocialLimits',
        ]);
        $sql = $sql->where('status', 'active');
        $sql = $sql->where('id', $project_id);

        $sql = $sql->whereHas('projectLimitsDay', function ($query) {
            return $query->where(strtolower(Carbon::now()->format('l')), '!=', 0);
        });

        $result = $sql->first();

        if(!$result) abort(404);

        return $result;
    }

}
