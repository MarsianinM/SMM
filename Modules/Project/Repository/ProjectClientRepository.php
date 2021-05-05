<?php


namespace Modules\Project\Repository;


use Illuminate\Http\UploadedFile;
use Illuminate\Support\Arr;
use Modules\Project\Entities\Project;

class ProjectClientRepository
{

    /**
     * Store the resource.
     * @param array $data
     * @return Project
     */
    public function store(array $data): Project
    {
        $data['client_id'] = auth()->user()->id;
        $page = Project::create(Arr::except($data, 'image'));
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
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig
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

    public function getProjects($request = false): mixed
    {
        $sql = Project::where('client_id',auth()->user()->id);
        if(!empty($request['sort'])){
            $sql = $sql->orderBy($request['sort']);
        }
        return $sql->with(['rate','subject'])->paginate('8');
    }

}
