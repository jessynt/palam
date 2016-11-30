<?php


namespace App\Repositories;


use App\Models\Page;

class PageRepository extends Repository
{
    /** @var Page $model */
    private $model;

    /**
     * PagRepository constructor.
     *
     * @param Page $model
     */
    public function __construct(Page $model)
    {
        $this->model = $model;
    }

    public function getModel()
    {
        return $this->model;
    }
}