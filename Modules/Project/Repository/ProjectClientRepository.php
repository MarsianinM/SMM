<?php


namespace Modules\Project\Repository;


use Illuminate\Http\UploadedFile;
use Illuminate\Support\Arr;
use Modules\Project\Entities\Project;
use Modules\Project\Entities\ProjectGroup;
use Modules\ProjectLimits\Entities\ProjectLimit;
use Modules\ProjectLimits\Entities\ProjectLimitDay;
use Modules\ProjectLimits\Entities\ProjectSocialLimit;
use Modules\Rates\Repository\CategoryRepository;
use Modules\Subjects\Entities\Subject;
use Modules\Subjects\Repository\SubjectRepository;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

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
        if($data['author_group_id'] == 0){
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
        $result = $project->update($data);
        /*if (Arr::get($data, 'image') instanceof UploadedFile) {
            $page->clearMediaCollection('projects');
            $page->addMedia($data['image'])
                /* ->usingFileName(function($fileName) {
                     return (string)strtolower(Str::slug($fileName));
                 })*/
               /* ->toMediaCollection('projects');
        }*/
        return $result;
    }

    public function getProjects($request = false)
    {
        $sql = $this->model->where('client_id',auth()->user()->id);
        if(!empty($request['sort'])){
            $sql = $sql->orderBy($request['sort']);
        }else{
            $sql = $sql->orderBy('id','desc');
        }
        return $sql->with(['rate','subject','projectCount'])->paginate('8');
    }

/*    public function getProjectData(
        SubjectRepository $subjects,
        CategoryRepository $ratesRep,
        ProjectGroupRepository $projectGroup,
        ProjectAuthorGroupRepository $author_group
    )
    {
        return [
            'subjects'          => $subjects->getList(),
            'rates'             => $ratesRep->getListRatesAll(),
            'project_group'     => $projectGroup->getProjectGroup(),
            'user_group'        => $author_group->getAuthorGroup(),
            'delimiter'         => '',
        ];
    }*/

}
