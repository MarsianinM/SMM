<?php


namespace Modules\Settings\Repository;


use Illuminate\Http\UploadedFile;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Modules\Settings\Entities\Setting;

class SettingRepository
{

    /**
     * Store the resource.
     * @param array $data
     * @return Setting
     */
    public function store(array $data): Setting
    {
        if(!empty($data['active'])){
            $data['active'] = $data['active'] == 'on' ? '1' : '0';
        }else{
            $data['active'] = '0';
        }
        $data['slug'] = Str::slug($data['title']);
        $Setting = Setting::create(Arr::except($data, 'image'));
        if (Arr::get($data, 'image') instanceof UploadedFile) {
            $Setting->addMedia($data['image'])
                /*->sanitizingFileName(function($fileName) {
                    return strtolower(Str::slug($fileName));
                })*/
                ->toMediaCollection('settings');
        }
        return $Setting;
    }

    /**
     * Update the resource.
     * @param Setting $Setting
     * @param $data
     * @return Setting
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig
     */
    public function update(Setting $Setting, $data): Setting
    {
        if(!empty($data['active'])){
            $data['active'] = $data['active'] == 'on' ? '1' : '0';
        }else{
            $data['active'] = '0';
        }

        $this->activeOnOff($Setting, $data['active']);

        if(!empty($data['title'])){
            $data['slug'] = Str::slug($data['title']);
        }
        $Setting->update(Arr::except($data, 'image'));
        if (Arr::get($data, 'image') instanceof UploadedFile) {
            $Setting->clearMediaCollection('settings');
            $Setting->addMedia($data['image'])
                /* ->usingFileName(function($fileName) {
                     return (string)strtolower(Str::slug($fileName));
                 })*/
                ->toMediaCollection('settings');
        }
        return $Setting;
    }
}
