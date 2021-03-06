<?php


namespace Modules\Pages\Repository;


use Illuminate\Http\UploadedFile;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Modules\Pages\Entities\Page;

class PageAdminRepository
{

    /**
     * Store the resource.
     * @param array $data
     * @return Page
     */
    public function store(array $data): Page
    {
        if(!empty($data['active'])){
            $data['active'] = $data['active'] == 'on' ? '1' : '0';
        }else{
            $data['active'] = '0';
        }
        $data['slug'] = Str::slug($data['title']);
        $page = Page::create(Arr::except($data, 'image'));
        if (Arr::get($data, 'image') instanceof UploadedFile) {
            $page->addMedia($data['image'])
                /*->sanitizingFileName(function($fileName) {
                    return strtolower(Str::slug($fileName));
                })*/
                ->toMediaCollection('pages');
        }
        return $page;
    }

    /**
     * Update the resource.
     * @param Page $page
     * @param $data
     * @return Page
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig
     */
    public function update(Page $page, $data): Page
    {
        if(!empty($data['active'])){
            $data['active'] = $data['active'] == 'on' ? '1' : '0';
        }else{
            $data['active'] = '0';
        }

        $this->activeOnOff($page, $data['active']);

        if(!empty($data['title'])){
            $data['slug'] = Str::slug($data['title']);
        }
        $page->update(Arr::except($data, 'image'));
        if (Arr::get($data, 'image') instanceof UploadedFile) {
            $page->clearMediaCollection('pages');
            $page->addMedia($data['image'])
                /* ->usingFileName(function($fileName) {
                     return (string)strtolower(Str::slug($fileName));
                 })*/
                ->toMediaCollection('pages');
        }
        return $page;
    }

    protected function activeOnOff(Page $page, $active){

        $childs = Page::where('parent_id','=',$page->id)->where('active', '!=', $active)->get();

        if(count($childs)){
            foreach ($childs as $child){
                $child->active = $active;
                $this->activeOnOff($child, $active);
            }
        };
        if(!empty($data['active'])){
            $data['active'] = $data['active'] == 'on' ? '1' : '0';
        }else{
            $data['active'] = '0';
        }
        $page->update($data);
    }


    public function childDelete(Page $page)
    {
        $childs = Page::where('parent_id','=',$page->id)->get();

        if(count($childs)){
            foreach ($childs as $child){
                $this->childDelete($child);
            }
        };
        $page->delete();
    }
}
