<?php

namespace Modules\News\Repository;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Modules\News\Entities\NewDescription;
use Modules\News\Entities\News;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

class NewsAdminRepository
{

    /**
     * Store the resource.
     * @param array $data
     * @return mixed
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
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public function update(News $news, $data): News
    {
        $data['slug'] = Str::slug($data['slug']);

        $news->update(Arr::except($data, 'image'));
        if (Arr::get($data, 'image') instanceof UploadedFile) {
            $news->clearMediaCollection('news');
            $news->addMedia($data['image'])
                /* ->usingFileName(function($fileName) {
                     return (string)strtolower(Str::slug($fileName));
                 })*/
                ->toMediaCollection('news');
        }

        foreach ($data['newsDescription'] as $item){
            $news->newsDescription()->update($item);
        }

        return $news;
    }
}
