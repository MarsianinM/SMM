<?php


namespace Modules\AuthorGroup\Repository;

use Modules\AuthorGroup\Entities\AuthorGroup;
use Modules\AuthorGroup\Entities\UserAuthorGroup;
use Modules\Users\Repository\UserRepository;

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
        $author = app(UserRepository::class)->model()
                    ->where('name', $data['name'])
                    ->where('id', '!=', auth()->id())
                    ->first();

        if(is_null($author))
            return ['error' => trans('authorgroup::user_author_group.errors_not_found_user', ['NAME' => $data['name']])];

        $userInGroup = $this->model->where('user_id', $author->id)->where('group_id',$data['group_id'])->first();

        if(!is_null($userInGroup))
            return ['error' => trans('authorgroup::user_author_group.errors_user_in_this_group', ['NAME' => $data['name']])];

        $array = [
            'user_id'   =>  $author->id,
            'group_id'  =>  $data['group_id'],
        ];

        if($this->model->create($array))
            return ['success' => trans('authorgroup::user_author_group.success_create', ['NAME' => $data['name']])];

        return ['error' => trans('authorgroup::user_author_group.errors_not_create', ['NAME' => $data['name']])];
    }


    public function getUser($id)
    {
        return $this->model->where('group_id', $id)->with(['user', 'group'])->paginate(15);
    }

    public function destroy(array $data): array
    {
        $user = app(UserRepository::class)->model()->where('id',$data['user_id'])->first();

        if(is_null($user))
            return ['error' => trans('authorgroup::user_author_group.errors_user_not_found', ['ID' => $data['user_id']])];
        $name = $user->name;
        if($this->model->where('id',$data['id'])->delete())
            return ['success' => trans('authorgroup::user_author_group.success_deleted', ['NAME' => $name])];

        return ['error' => trans('authorgroup::user_author_group.error_not_delete_user', ['ID' => $data['user_id']])];
    }
}
