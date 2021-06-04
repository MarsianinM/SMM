<?php


class ProjectVipRepository
{
    /**
     * @var Project
     */
    protected Project $model;

    public function __construct(Project $project)
    {
        $this->model = $project;
    }

    public function model(): Project
    {
        return $this->model;
    }
}
