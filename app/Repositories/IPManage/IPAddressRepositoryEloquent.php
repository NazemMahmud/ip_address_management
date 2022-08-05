<?php

namespace App\Repositories\IPManage;

use App\Models\IpAddress;
use App\Repositories\BaseRepositoryEloquent;

class IPAddressRepositoryEloquent extends BaseRepositoryEloquent implements IPAddressRepositoryInterface
{

    public function __construct(protected IpAddress $model)
    {
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
        /** For audit log, need to update using save() */
        $query = $this->model;
        foreach ($conditions as $key => $value) {
            $query = $query->where($key, $value);
        }

        $query = $query->first();

        if (!empty($query)) {
            $query['label'] = $data['label'];
            return $query->save($data);
        }

        return false;
    }
}
