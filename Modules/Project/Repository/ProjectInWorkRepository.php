<?php


namespace Modules\Project\Repository;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Modules\Project\Entities\Project;
use Modules\Project\Entities\ProjectCountBay;
use Modules\Project\Entities\ProjectInWork;

class ProjectInWorkRepository
{
    /**
     * @var ProjectInWork
     */
    protected ProjectInWork $model;

    public function __construct(ProjectInWork $project)
    {
        $this->model = $project;
    }

    public function add(Request $request)
    {
        $project = ProjectCountBay::where('project_id',$request->get('project_id'))->first();

        if(empty($project->count) or $project->count < 1) return ['error' => trans('project::author.error_project_count')];

        $project->count -= 1;
        if(!$project->update()) return ['error' => trans('project::author.error_project_update')];

        return $this->model->create($request->all());
    }

    public function deleted(Project $project)
    {
        $project_in_work = ProjectInWork::where('id',$project->projectAuthorInWork->id)
            ->where('created_at', '<=', Carbon::now()->addMinutes(-25)->toDateTimeString())
            ->get();
        foreach ($project_in_work as $item){
            $item->delete();
        }
        /* ProjectInWork::where('id',$project->projectAuthorInWork->id)
            ->where('created_at', '<=', Carbon::now()->addMinutes(-25)->toDateTimeString())
            ->delete();*/
        $projectbay = ProjectCountBay::where('project_id',$project->projectAuthorInWork->id)->whereStatus('1')->first();
        foreach ($project_in_work as $item){
            $projectbay->count += 1;
        }
        $projectbay->save();
    }

}
