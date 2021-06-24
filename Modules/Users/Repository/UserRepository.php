<?php


namespace Modules\Users\Repository;


use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Modules\Users\Entities\User;
use Illuminate\Support\Arr;

class UserRepository
{
    /**
     * @var User
     */
    protected User $model;


    public function __construct(User $user)
    {
        $this->model = $user;
    }

    /**
     * @return User
     */
    public function model(): User
    {
        return $this->model;
    }


}
