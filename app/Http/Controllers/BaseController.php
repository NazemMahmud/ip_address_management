<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    /**  resource class for API data return format */
    protected string $resource;

    /**  resource collection class for API data collection return format */
    protected string $resourceCollection;


    /**
     * Get all / paginated data
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request): mixed
    {
        $pageOffset = (isset($request->pageOffset)) ? (int)$request->pageOffset : null;
        $orderBy = $request->orderBy ?? 'DESC';
        $sortBy = $request->sortBy ?? 'id';

        return new $this->resourceCollection($this->repository->getAll($pageOffset, $orderBy, $sortBy));
    }
}
