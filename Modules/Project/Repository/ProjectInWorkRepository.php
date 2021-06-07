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
        $project_in_work = ProjectInWork::where('project_id',$project->id)
            ->where('status', 'in_work')
            ->where('created_at', '<=', Carbon::now()->addMinutes(-25)->toDateTimeString())
            ->get();
        foreach ($project_in_work as $item){
            $item->delete();
        }
        $projectbay = ProjectCountBay::where('project_id',$project->id)->whereStatus('1')->first();

        foreach ($project_in_work as $item){
            $projectbay->count += 1;
        }
        $projectbay->save();
    }

    /**
     * canceled project in user
     *
     */
    public function refused(Project $project)
    {
        $project_in_work = ProjectInWork::where('project_id',$project->id)
            ->where('status', 'in_work')
            ->where('author_id', auth()->id())
            ->first();
        $project_in_work->update(['status'=>'refused']);
        $projectbay = ProjectCountBay::where('project_id',$project->id)->whereStatus('1')->first();

        $projectbay->count += 1;

        $projectbay->save();
    }

    /**
     * @param array $data
     * @return array
     */
    public function setInCheckProject(array $data)
    {
        $project_in_work = $this->model->where('project_id',$data['project_id'])
            ->where('status', 'in_work')
            ->where('author_id', $data['user_id'])
            ->where('created_at', '>=', Carbon::now()->addMinutes(-25)->toDateTimeString()) //TEST
            ->first();
        if(!$project_in_work) return ['error' => trans('project::author.error_project_update')];
        $data['status'] = 'in_check';
        return $project_in_work->update($data);
    }

    /**
     * @param $project_id
     * @return mixed
     */
    public function getInCheckProject($project_id): mixed
    {
        return $this->model
            ->with([
                'project',
                'project.client',
                'author'
            ])
            ->where('project_id',$project_id)
            ->where('status', 'in_check')
            ->where('client_id', auth()->id())
            ->paginate();
    }
}
