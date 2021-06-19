<?php


namespace Modules\Project\Repository;


use Illuminate\Http\UploadedFile;
use Illuminate\Support\Arr;
use Modules\Project\Entities\AuthorGroup;
use Modules\Project\Entities\Project;
use Modules\ProjectGroup\Entities\ProjectGroup;
use Modules\Subjects\Entities\Subject;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

class ProjectAuthorGroupRepository
{
    /**
     * @var ProjectGroup
     */
    protected AuthorGroup $model;

    public function __construct(AuthorGroup $authorGroup)
    {
        $this->model = $authorGroup;
    }

    /**
     * Store the resource.
     * @param array $data
     * @return AuthorGroup
     */
    public function store(array $data): AuthorGroup
    {
        $data['client_id'] = auth()->user()->id;
        $page = $this->model->create($data);

        return $page;
    }

    /**
     * Update the resource.
     * @param AuthorGroup $page
     * @param $data
     * @return AuthorGroup
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public function update(AuthorGroup $page, $data): AuthorGroup
    {
        $page->update($data);
        return $page;
    }

    public function getAuthorGroup()
    {
        return $this->model
                    ->where('client_id',auth()->user()->id)
                    ->get();
    }

}
