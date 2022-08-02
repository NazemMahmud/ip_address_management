<?php

namespace App\Repositories\IPManage;

use App\Models\IpAddress;

class IPAddressRepositoryEloquent implements IPAddressRepositoryInterface
{

    public function __construct(protected IpAddress $model)
    {
    }

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

    /**
     * Store new IP address
     * @param array $data
     * @return mixed
     */
    public function storeResource(array $data): mixed
    {
        return $this->model::create($data);
    }

    /**
     * Get single row data based on condition
     * @param string $columnName
     * @param mixed $value
     * @return mixed
     */
    public function getByColumn(string $columnName, mixed $value): mixed
    {
        return $this->model::where($columnName, $value)->first();
    }

    /**
     * update data
     * @param array $data
     * @param array $conditions
     * @return mixed
     */
    public function updateResource(array $data, array $conditions): mixed
    {

        $query = $this->model;
        foreach ($conditions as $key => $value) {
            $query = $query->where($key, $value);
        }

        return $query->update($data);
    }
}
