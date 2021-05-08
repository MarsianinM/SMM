<?php


namespace Modules\Project\Repository;


use Illuminate\Http\UploadedFile;
use Illuminate\Support\Arr;
use Modules\Project\Entities\Project;
use Modules\Subjects\Entities\Subject;
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

    /**
     * Store the resource.
     * @param array $data
     * @return Project
     */
    public function store(array $data): Project
    {
        $data['client_id'] = auth()->user()->id;
        $page = $this->model->create(Arr::except($data, 'image'));
        if (Arr::get($data, 'image') instanceof UploadedFile) {
            $page->addMedia($data['image'])
                /*->sanitizingFileName(function($fileName) {
                    return strtolower(Str::slug($fileName));
                })*/
                ->toMediaCollection('projects');
        }
        return $page;
    }

    /**
     * Update the resource.
     * @param Project $page
     * @param $data
     * @return Project
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public function update(Project $page, $data): Project
    {
        $page->update(Arr::except($data, 'image'));
        if (Arr::get($data, 'image') instanceof UploadedFile) {
            $page->clearMediaCollection('projects');
            $page->addMedia($data['image'])
                /* ->usingFileName(function($fileName) {
                     return (string)strtolower(Str::slug($fileName));
                 })*/
                ->toMediaCollection('projects');
        }
        return $page;
    }

    public function getProjects($request = false)
    {
        $sql = $this->model->where('client_id',auth()->user()->id);
        if(!empty($request['sort'])){
            $sql = $sql->orderBy($request['sort']);
        }
        return $sql->with(['rate','subject'])->paginate('8');
    }

}
