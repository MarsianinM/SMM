<?php


namespace Modules\AuthorGroup\Repository;

use Modules\AuthorGroup\Entities\AuthorGroup;
use Modules\AuthorGroup\Entities\UserAuthorGroup;

class UserAuthorGroupRepository
{
    /**
     * @var UserAuthorGroup
     */
    protected UserAuthorGroup $model;
    /**
     * @var AuthorGroup
     */
    protected AuthorGroup $group;

    /**
     * UserAuthorGroupRepository constructor.
     * @param UserAuthorGroup $userAuthorGroup
     * @param AuthorGroup $authorGroup
     */
    public function __construct(UserAuthorGroup $userAuthorGroup, AuthorGroup $authorGroup)
    {
        $this->model = $userAuthorGroup;
        $this->group = $authorGroup;
    }

    /**
     * @return UserAuthorGroup
     */
    public function model(): UserAuthorGroup
    {
        return $this->model;
    }

    /**
     * @return AuthorGroup
     */
    public function modelGroup(): AuthorGroup
    {
        return $this->group;
    }

    /**
     * Store the resource.
     * @param array $data
     */
    public function store(array $data)
    {
        /*$author = User::where('name',$data['name'])->first();

        if(is_null($author))
            return ['error' => trans('AuthorGroup::blacklist.errors_not_found_user', ['NAME' => $data['name']])];

        $data['user_id'] = $author->id;
        $data['client_id'] = auth()->user()->id;

        if($data['user_id'] === $data['client_id'])
            return ['error' => trans('AuthorGroup::blacklist.errors_not_self_add')];

        if($this->model->create($data))
            return ['success' => trans('AuthorGroup::blacklist.success_create_blacklist', ['NAME' => $data['name']])];

        return ['error' => trans('AuthorGroup::blacklist.errors_not_create', ['NAME' => $data['name']])];*/
    }


    public function getBlackList()
    {
        /*return $this->model->with(['author','client'])->where('client_id', auth()->id())->paginate(30);*/
    }

}
