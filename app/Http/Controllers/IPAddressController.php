<?php

namespace App\Http\Controllers;

use App\Helpers\Constants;
use App\Helpers\HttpHandler;
use App\Http\Requests\IpAddress\IpAddressCreateRequest;
use App\Repositories\IPManage\IPAddressRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Resources\IpAddress\IpAddressResource;
use App\Http\Resources\IpAddress\IpAddressResourceCollection;

class IPAddressController extends Controller
{
    /**
     * resource class for API data return format
     * @var string
     */
    protected string $resource;


    /**
     * resource collection class for API data return format
     * @var string
     */
    protected string $resourceCollection;

    public function __construct(protected IPAddressRepositoryInterface $repository)
    {
        $this->resource = IpAddressResource::class;
        $this->resourceCollection = IpAddressResourceCollection::class;
    }

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

    /**
     * Store a new IP address in db
     * @param IpAddressCreateRequest $request
     * @return JsonResponse
     */
    public function store(IpAddressCreateRequest $request): JsonResponse
    {
        if ($response = $this->repository->storeResource($request->all())) {
            return HttpHandler::successResponse(new $this->resource($response), 201);
        }

        return HttpHandler::errorMessage(Constants::SOMETHING_WENT_WRONG);
    }

    /**
     * Get a single IP address info
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        if ($response = $this->repository->getByColumn('id', $id)) {
            return HttpHandler::successResponse(new $this->resource($response));
        }

        return HttpHandler::errorMessage(Constants::NOT_FOUND, 404);
    }

    public function update(string $ip)
    {
        // TODO
    }
}
