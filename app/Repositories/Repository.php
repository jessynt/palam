<?php
namespace App\Repositories;

abstract class Repository
{
    /**
     * @return \Illuminate\Database\Eloquent\Model
     */
    abstract public function getModel();

    /**
     * @param $count
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function latest($count)
    {
        return $this->getModel()->orderBy('created_at', 'DESC')
            ->limit($count)
            ->get();
    }
}