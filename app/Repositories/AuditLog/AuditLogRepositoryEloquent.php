<?php

namespace App\Repositories\AuditLog;

use App\Models\AuditLog;
use App\Repositories\BaseRepositoryEloquent;

class AuditLogRepositoryEloquent extends BaseRepositoryEloquent implements AuditLogRepositoryInterface
{

    public function __construct(protected AuditLog $model)
    {
    }
}
