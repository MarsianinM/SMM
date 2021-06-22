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
     * @return AuthorGroup
     */
    public function store(array $data): AuthorGroup
    {
        $data['client_id'] = auth()->user()->id;
        $page = $this->model->create($data);

        return $page;
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
            ->where('client_id',auth()->user()->id)
            ->get();
    }
}
