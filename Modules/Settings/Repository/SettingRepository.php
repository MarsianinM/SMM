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
        $Setting = Setting::create(Arr::except($data, 'site_logo'));
        if (Arr::get($data, 'site_logo') instanceof UploadedFile) {
            $Setting->addMedia($data['site_logo'])
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
        $Setting->update(Arr::except($data, 'site_logo'));
        if (Arr::get($data, 'site_logo') instanceof UploadedFile) {
            $Setting->clearMediaCollection('settings');
            $Setting->addMedia($data['site_logo'])
                /* ->usingFileName(function($fileName) {
                     return (string)strtolower(Str::slug($fileName));
                 })*/
                ->toMediaCollection('settings');
        }
        return $Setting;
    }
}
