<?php


namespace Modules\ProjectGroup\Repository;

use Modules\Project\Repository\ProjectClientRepository;
use Modules\ProjectGroup\Entities\ProjectGroup;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

class ProjectGroupRepository
{
    /**
     * @var ProjectGroup
     */
    protected ProjectGroup $model;


    public function __construct(ProjectGroup $project)
    {
        $this->model = $project;
    }

    /**
     * @return ProjectGroup
     */
    public function model(): ProjectGroup
    {
        return $this->model;
    }

    /**
     * Store the resource.
     * @param array $data
     * @return ProjectGroup
     */
    public function store(array $data): ProjectGroup
    {
        $data['client_id'] = auth()->user()->id;
        $page = $this->model->create($data);

        return $page;
    }

    /**
     * Update the resource.
     * @param ProjectGroup $page
     * @param $data
     * @return ProjectGroup
     */
    public function update(ProjectGroup $page, $data): ProjectGroup
    {
        $page->update($data);
        return $page;
    }

    /**
     * @return mixed
     */
    public function getProjectGroup(): mixed
    {
        return $this->model
                    ->where('user_id',auth()->user()->id)
                    //->where('show',1)
                    ->where('parent_id',0)
                    ->with('child')
                    ->get();
    }

    /**
     * @param int $id_group
     * @param int $transfer_id
     * @return array
     */
    public function transferProjectInNewGroup(int $id_group, int $transfer_id): array
    {
        $projectRepository = app(ProjectClientRepository::class);
        $project_ids = $projectRepository->model()->where('group_id', $id_group)->get(['id'])->pluck('id')->toArray();

        if(!count($project_ids)) return ['error' => trans('projectgroup::project_group.error_not_project_in_group')];

        $projectGroup = $this->model->whereId($transfer_id)->first();

        if(is_null($projectGroup))
            return ['error' => trans('projectgroup::project_group.errors_not_found', ['ID' => $transfer_id])];

        $result = $projectRepository->model()->whereIn('id', $project_ids)->update(['group_id' => $transfer_id]);

        if(!$result) return ['error' => trans('projectgroup::project_group.error_update_no')];

        return ['success' => trans('projectgroup::project_group.success_update_transfer', ['PROJECT' => $projectGroup->name])];
    }

}
