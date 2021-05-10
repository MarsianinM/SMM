<?php

namespace Modules\News\Repository;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Modules\News\Entities\NewDescription;
use Modules\News\Entities\News;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

class NewsRepository
{
    /**
     * @var News
     */
    protected News $model;

    public function __construct(News $news)
    {
        $this->model = $news;
    }

    public function model()
    {
        return $this->model;
    }

    public function getNews()
    {
        return $this->model->with('newsDescription')->get();
    }


}
