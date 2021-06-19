<?php


namespace Modules\Project\Repository;


use Illuminate\Support\Arr;
use Modules\Project\Entities\Project;
use Modules\ProjectLimits\Entities\ProjectLimit;
use Modules\ProjectLimits\Entities\ProjectLimitDay;
use Modules\ProjectLimits\Entities\ProjectSocialLimit;

class ProjectClientRepository
{
    /**
     * @var Project
     */
    protected Project $model;

    public function __construct(Project $project)
    {
        $this->model = $project;
    }

    public function model(): Project
    {
        return $this->model;
    }
    /**
     * Store the resource.
     * @param array $data
     * @return mixed
     */
    public function store(array $data)
    {
        if(empty($data['author_group_id']) or $data['author_group_id'] == 0){
            $data['author_group_id'] = null;
        }

        $result = $this->model->create(Arr::except($data, ['day_active','limit', '_token']));

        if(!$result) return false;

        if(Arr::has($data, 'limit')){
            $limit = Arr::add($data['limit'], 'project_id', $result->id);
            ProjectLimit::create($limit);
        }
        if(Arr::has($data, 'day_active')){
            $day_active = Arr::add($data['day_active'], 'project_id', $result->id);
            ProjectLimitDay::create($day_active);
        }

        if(Arr::has($data, 'social')){
            $social_limit = Arr::add($data['social'], 'project_id', $result->id);
            ProjectSocialLimit::create($social_limit);
        }

        return $result;
    }

    /**
     *
     * Update the resource.
     * @param Project $project
     * @param $data
     * @return bool
     */
    public function update(Project $project, $data): bool
    {
        if($data['author_group_id'] == 0){
            $data['author_group_id'] = null;
        }

        $result = $project->update(Arr::except($data, ['day_active','limit', '_token']));

        if(!$result) return false;

        if(Arr::has($data, 'limit')){
            $limit = Arr::add($data['limit'], 'project_id', $project->id);
            $projectLimit = ProjectLimit::where('project_id', $project->id)->first();
            if(!$projectLimit){
                ProjectLimit::create($limit);
            }else{
                $projectLimit->update($limit);
            }

        }
        if(Arr::has($data, 'day_active')){
            $day_active = Arr::add($data['day_active'], 'project_id', $project->id);
            $projectLimitDay = ProjectLimitDay::where('project_id', $project->id)->first();
            if(!$projectLimitDay){
                ProjectLimitDay::create($day_active);
            }else{
                $projectLimitDay->update($day_active);
            }
        }

        if(Arr::has($data, 'social')){
            $social_limit = Arr::add($data['social'], 'project_id', $project->id);
            $projectSocialLimit = ProjectSocialLimit::where('project_id', $project->id)->first();
            if(!$projectSocialLimit){
                ProjectSocialLimit::create($social_limit);
            }else{
                $projectSocialLimit->update($social_limit);
            }
        }

        return $result;
    }

    public function getProjects($request = false)
    {
        $sql = $this->model->where('client_id',auth()->user()->id);
        $sql = $sql->with([
            'rate',
            'subject',
            'projectCount',
            'projectInCheck',
            'projectForRevision',
            'projectInWork',
            'projectVerified',
            'projectVip'  => function ($query) {
                $query->orderBy('created_at', 'desc');
            },
        ]);
        if(!empty($request['sort'])){
            $sql = $sql->orderBy($request['sort']);
        }else{
            $sql = $sql->orderBy('id','desc');
        }

        return $sql->paginate('8');
    }

    /**
     * @param false $vip
     * @return int
     */
    public function getActiveProject($vip = false): int
    {
        $project = $this->model->where('status', 'active');
        if($vip){
            $project = $project->whereHas('projectVip', function ($query) {
                return $query;
            });
        }
        $project = $project->get();
        return count($project);
    }

    public function getStatisticProject()
    {
        $data = collect();

        $data->finish_project =  $this->getStatusProjectCount();
        $data->project_count_bay_sum =  $this->getProjectBayCount();
        $data->project_in_check =  $this->getStatusProjectCount('in_check');
        $data->project_for_revision =  $this->getStatusProjectCount('for_revision');
        $data->project_user_work =  $this->getStatusProjectCount('in_work');

        return $data;
    }


    protected function getStatusProjectCount($status = 'verified'){
        return app(ProjectInWorkRepository::class)->model()
                    ->where('client_id', auth()->id())
                    ->whereStatus($status)
                    ->count();
    }

    /**
     * @return mixed
     */
    protected function getProjectBayCount(){

        return app(ProjectCountBayRepository::class)->model()
            ->whereIn('id', $this->model
                ->where('client_id', auth()->id())
                ->get('id'))
            ->sum('count');
    }


}
