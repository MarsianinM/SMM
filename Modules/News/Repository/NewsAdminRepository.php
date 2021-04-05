<?php

namespace Modules\News\Repository;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Modules\News\Entities\NewDescription;
use Modules\News\Entities\News;

class NewsAdminRepository
{

    /**
     * Store the resource.
     * @param array $data
     */
    public function store(array $data)
    {
        $data['slug'] = Str::slug($data['newsDescription'][config('app.locale')]['title']);
        $news = News::create(Arr::except($data, 'image'));
        if (\Arr::get($data, 'image') instanceof UploadedFile) {
            $news->addMedia($data['image'])
                /*->sanitizingFileName(function($fileName) {
                    return strtolower(Str::slug($fileName));
                })*/
                ->toMediaCollection('news');
        }
        foreach ($data['newsDescription'] as $item){
            $newsDescription = new NewDescription($item);
            $news->newsDescription()->save($newsDescription);
        }

        return $news;
    }

    /**
     * Update the resource.
     * @param News $news
     * @param $data
     * @return News
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig
     */
    public function update(News $news, $data): News
    {
        if(!empty($data['active'])){
            $data['active'] = $data['active'] == 'on' ? '1' : '0';
        }else{
            $data['active'] = '0';
        }

        if(!empty($data['title'])){
            $data['slug'] = Str::slug($data['title']);
        }
        $news->update(Arr::except($data, 'image'));
        if (Arr::get($data, 'image') instanceof UploadedFile) {
            $news->clearMediaCollection('news');
            $news->addMedia($data['image'])
                /* ->usingFileName(function($fileName) {
                     return (string)strtolower(Str::slug($fileName));
                 })*/
                ->toMediaCollection('news');
        }
        return $news;
    }
}
