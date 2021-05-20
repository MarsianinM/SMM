<?php


namespace Modules\Project\Repository;


use Carbon\Carbon;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
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
    public function getProject(): LengthAwarePaginator
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

        $sql = $sql->orderBy('id', 'desc');
        return $sql->paginate(10);
    }

}
