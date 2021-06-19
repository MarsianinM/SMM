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

    /**
     * @param int $group_id
     * @return int
     */
    public function getCountProject(int $group_id): int
    {
        /*$count = 0;
        $categoryIds = $this->children()->get(['id'])->pluck('id')->toArray();

        $projectGroup = $this->model->where('id', $group_id)->with('child')->first();
        if(is_null($projectGroup)) return $count;

        return Product::query()->whereIn('category_id', $categoryIds)->count();
        return $count;*/
    }
}
