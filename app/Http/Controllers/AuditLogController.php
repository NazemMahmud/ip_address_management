<?php

namespace App\Http\Controllers;

use App\Http\Resources\AuditLog\AuditLogResource;
use App\Http\Resources\AuditLog\AuditLogResourceCollection;
use App\Repositories\AuditLog\AuditLogRepositoryInterface;

class AuditLogController extends BaseController
{
    public function __construct(protected AuditLogRepositoryInterface $repository)
    {
        $this->resource = AuditLogResource::class;
        $this->resourceCollection = AuditLogResourceCollection::class;
    }
}
