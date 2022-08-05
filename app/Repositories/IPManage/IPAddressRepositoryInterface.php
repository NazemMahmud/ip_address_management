<?php

namespace App\Repositories\IPManage;

interface IPAddressRepositoryInterface {

    // store a new one
    public function storeResource(array $data): mixed;

    // get single data
    public function getByColumn(string $columnName, mixed $value): mixed;

    // update data
    public function updateResource(array $data, array $conditions): mixed;

}
