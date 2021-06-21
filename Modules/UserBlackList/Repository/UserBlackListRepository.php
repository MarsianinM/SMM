<?php


namespace Modules\UserBlackList\Repository;

use Modules\Project\Repository\ProjectClientRepository;
use Modules\UserBlackList\Entities\UserBlackList;
use Modules\Users\Entities\User;

class UserBlackListRepository
{
    /**
     * @var UserBlackList
     */
    protected UserBlackList $model;


    public function __construct(UserBlackList $blackList)
    {
        $this->model = $blackList;
    }

    /**
     * @return UserBlackList
     */
    public function model(): UserBlackList
    {
        return $this->model;
    }

    /**
     * Store the resource.
     * @param array $data
     */
    public function store(array $data)
    {
        $author = User::where('name',$data['name'])->first();

        if(is_null($author))
            return ['error' => trans('userblacklist::blacklist.errors_not_found_user', ['NAME' => $data['name']])];

        $data['user_id'] = $author->id;
        $data['client_id'] = auth()->user()->id;

        if($data['user_id'] === $data['client_id'])
            return ['error' => trans('userblacklist::blacklist.errors_not_self_add')];

        if($this->model->create($data))
            return ['success' => trans('userblacklist::blacklist.success_create_blacklist', ['NAME' => $data['name']])];

        return ['error' => trans('userblacklist::blacklist.errors_not_create', ['NAME' => $data['name']])];
    }

    /**
     * @param array $blackList_ids
     * @return int
     */
    public function multipleDestroy(array $blackList_ids): int
    {
        return $this->model->destroy($blackList_ids);
    }

    public function getBlackList()
    {
        return $this->model->with(['author','client'])->where('client_id', auth()->id())->paginate(30);
    }

}
