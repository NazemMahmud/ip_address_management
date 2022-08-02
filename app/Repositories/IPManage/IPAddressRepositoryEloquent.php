<?php

namespace App\Repositories\IPManage;

use App\Models\IpAddress;

class IPAddressRepositoryEloquent implements IPAddressRepositoryInterface {

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
     * @param string $value
     * @return mixed
     */
    public function getByColumn(string $columnName, string $value): mixed
    {
        return $this->model::where($columnName, $value)->first();
    }
}
