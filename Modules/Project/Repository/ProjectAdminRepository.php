<?php

namespace Modules\Project\Repository;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Modules\Project\Entities\Project;

class ProjectAdminRepository
{

    /**
     * Store the resource.
     * @param array $data
     * @return Project
     */
    public function store(array $data): Project
    {
        $data['slug'] = Str::slug($data['title']);
        $project = Project::create(Arr::except($data, 'image'));
        if (Arr::get($data, 'image') instanceof UploadedFile) {
            $project->addMedia($data['image'])
                /*->sanitizingFileName(function($fileName) {
                    return strtolower(Str::slug($fileName));
                })*/
                ->toMediaCollection('projects');
        }
        return $project;
    }

    /**
     * Update the resource.
     * @param Project $project
     * @param $data
     * @return Project
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig
     */
    public function update(Project $project, $data): Project
    {
        if(!empty($data['title'])){
            $data['slug'] = Str::slug($data['title']);
        }
        $project->update(Arr::except($data, 'image'));
        if (Arr::get($data, 'image') instanceof UploadedFile) {
            $project->clearMediaCollection('projects');
            $project->addMedia($data['image'])
                /* ->usingFileName(function($fileName) {
                     return (string)strtolower(Str::slug($fileName));
                 })*/
                ->toMediaCollection('projects');
        }
        return $project;
    }

}
