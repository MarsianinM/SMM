<?php


namespace Modules\Users\Repository;


use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Modules\Users\Entities\User;
use Illuminate\Support\Arr;

class UserAdminRepository
{

    /**
     * Store the resource.
     * @param array $data
     * @return mixed
     */
    public function store(array $data)
    {
        if(!empty($data['active']) & $data['active'] == 'on'){
            $data['active'] = 1;
        }else{
            $data['active'] = 0;
        }
        if(!empty($data['email_valid']) & $data['email_valid'] == 'on'){
            $data['email_verified_at'] = now();
        }else{
            $data['email_verified_at'] = NULL;
        }

        $user = User::create(Arr::except($data, 'image'));
        if (Arr::get($data, 'image') instanceof UploadedFile) {
            $user->addMedia($data['image'])
                ->sanitizingFileName(function($fileName) {
                    return strtolower(Str::slug($fileName));
                })
                ->toMediaCollection('advertisements');
        }
        return $user;
    }

    /**
     * Update the resource.
     * @param User $user
     * @param $data
     * @return User
     */
    public function update(User $user, $data): User
    {
        if(!empty($data['active'])){
            $data['active'] = $data['active'] == 'on' ? '1' : '0';
        }else{
            $data['active'] = '0';
        }

        $user->update(Arr::except($data, 'image'));
        if (Arr::get($data, 'image') instanceof UploadedFile) {
            // $name_image = 'advertisements_' . time();
            $user->clearMediaCollection('user_icon');
            $user->addMedia($data['image'])
                /*->usingFileName(function($fileName) {
                    return (string)strtolower(Str::slug($fileName));
                })*/
                ->toMediaCollection('user_icon');
        }
        return $user;
    }
}