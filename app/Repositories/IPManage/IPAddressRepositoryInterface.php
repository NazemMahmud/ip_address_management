<?php

namespace App\Repositories\IPManage;

interface IPAddressRepositoryInterface {
    public function getAll(): mixed;

    public function storeResource(array $data): mixed;

}
