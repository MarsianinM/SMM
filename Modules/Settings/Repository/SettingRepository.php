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
        $setting = Setting::first();
        $data['user_id'] = auth()->user()->id;
        if($setting){
            $setting->update(Arr::except($data, 'site_logo'));
        }else {
            $setting = Setting::create(Arr::except($data, 'site_logo'));
        }
        if (Arr::get($data, 'site_logo') instanceof UploadedFile) {
            $setting->clearMediaCollection('settings');
            $setting->addMedia($data['site_logo'])
                /*->sanitizingFileName(function($fileName) {
                    return strtolower(Str::slug($fileName));
                })*/
                ->toMediaCollection('settings');
        }
        return $setting;
    }

}
