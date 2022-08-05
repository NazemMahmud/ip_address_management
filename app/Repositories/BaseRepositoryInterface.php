<?php

namespace App\Repositories;

interface BaseRepositoryInterface {
    // get all / paginated data
    public function getAll(int|null $resourcePerPage, string $orderBy, string $sortBy): mixed;

}
