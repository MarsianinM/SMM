<?php


namespace Modules\Project\Repository;


use Illuminate\Http\UploadedFile;
use Illuminate\Support\Arr;
use Modules\Project\Entities\Project;
use Modules\Project\Entities\ProjectGroup;
use Modules\Subjects\Entities\Subject;
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
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public function update(ProjectGroup $page, $data): ProjectGroup
    {
        $page->update($data);
        return $page;
    }

    public function getProjectGroup()
    {
        dd(__FILE__,__METHOD__,'LINE: '.__LINE__,auth()->user()->id);
        $sql = $this->model->where('user_id',auth()->user()->id);
        return $sql->with(['rate','subject'])->paginate('8');
    }

}
