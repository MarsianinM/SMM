<?php


namespace Modules\ProjectGroup\Repository;

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

}
