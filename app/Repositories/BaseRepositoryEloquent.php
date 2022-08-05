<?php

namespace App\Repositories;


class BaseRepositoryEloquent implements BaseRepositoryInterface
{

    /**
     * Get all / paginated data
     *
     * @param int|null $resourcePerPage
     * @param string $orderBy
     * @param string $sortBy
     * @return mixed
     */
    public function getAll(int|null $resourcePerPage, string $orderBy, string $sortBy): mixed
    {
        $query = $this->model::orderBy($sortBy, $orderBy);

        return $resourcePerPage ? $query->paginate($resourcePerPage) : $query->get();
    }

}
