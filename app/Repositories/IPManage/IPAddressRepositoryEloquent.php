<?php

namespace App\Repositories\IPManage;


use App\Models\IpAddress;

class IPAddressRepositoryEloquent implements IPAddressRepositoryInterface {

    public function __construct(protected IpAddress $model)
    {
    }

    public function getAll(): mixed
    {
        // TODO
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
}
