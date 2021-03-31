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
        if(!empty($data['active'])){
            $data['active'] = $data['active'] == 'on' ? '1' : '0';
        }else{
            $data['active'] = '0';
        }
        $data['slug'] = Str::slug($data['title']);
        $Project = Project::create(Arr::except($data, 'image'));
        if (Arr::get($data, 'image') instanceof UploadedFile) {
            $Project->addMedia($data['image'])
                /*->sanitizingFileName(function($fileName) {
                    return strtolower(Str::slug($fileName));
                })*/
                ->toMediaCollection('projects');
        }
        return $Project;
    }

    /**
     * Update the resource.
     * @param Project $Project
     * @param $data
     * @return Project
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig
     */
    public function update(Project $Project, $data): Project
    {
        if(!empty($data['active'])){
            $data['active'] = $data['active'] == 'on' ? '1' : '0';
        }else{
            $data['active'] = '0';
        }

        $this->activeOnOff($Project, $data['active']);

        if(!empty($data['title'])){
            $data['slug'] = Str::slug($data['title']);
        }
        $Project->update(Arr::except($data, 'image'));
        if (Arr::get($data, 'image') instanceof UploadedFile) {
            $Project->clearMediaCollection('projects');
            $Project->addMedia($data['image'])
                /* ->usingFileName(function($fileName) {
                     return (string)strtolower(Str::slug($fileName));
                 })*/
                ->toMediaCollection('projects');
        }
        return $Project;
    }

}
