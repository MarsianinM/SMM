<?php


namespace Modules\AuthorGroup\Repository;

use Modules\AuthorGroup\Entities\AuthorGroup;
use Modules\Users\Entities\User;

class AuthorGroupRepository
{
    /**
     * @var AuthorGroup
     */
    protected AuthorGroup $model;


    public function __construct(AuthorGroup $authorGroup)
    {
        $this->model = $authorGroup;
    }

    /**
     * @return AuthorGroup
     */
    public function model(): AuthorGroup
    {
        return $this->model;
    }

    /**
     * Store the resource.
     * @param array $data
     * @return array
     */
    public function store(array $data): array
    {
        $data['client_id'] = auth()->id();

        if($this->model->create($data))
            return ['success' => trans('authorgroup::author_group.success_create', ['NAME' => $data['name']])];

        return ['error' => trans('authorgroup::author_group.errors_not_create', ['NAME' => $data['name']])];

    }

    /**
     * Update the resource.
     * @param AuthorGroup $page
     * @param $data
     * @return AuthorGroup
     */
    public function update(AuthorGroup $page, $data): AuthorGroup
    {
        $page->update($data);
        return $page;
    }

    public function getAuthorGroup()
    {
        return $this->model
            ->with('projects')
            ->where('client_id',auth()->user()->id)
            ->get();
    }
}
