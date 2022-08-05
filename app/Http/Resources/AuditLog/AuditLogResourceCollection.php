<?php

namespace App\Http\Resources\AuditLog;

use App\Helpers\Constants;
use Illuminate\Http\Resources\Json\ResourceCollection;

class AuditLogResourceCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection,
            'status' => Constants::SUCCESS
        ];
    }
}
