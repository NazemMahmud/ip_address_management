<?php

namespace App\Http\Controllers;

use App\Helpers\Constants;
use App\Helpers\HttpHandler;
use App\Http\Requests\IpAddress\IpAddressCreateRequest;
use App\Repositories\IPManage\IPAddressRepositoryInterface;
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

    public function index()
    {
        // TODO
    }

    public function store(IpAddressCreateRequest $request)
    {
        if ($response = $this->repository->storeResource($request->all())) {
            return HttpHandler::successResponse(new $this->resource($response), 201);
        }

        return HttpHandler::errorMessage(Constants::SOMETHING_WENT_WRONG);
    }

    public function show(Request $request, string $ip)
    {
        // TODO
    }

    public function update(string $ip)
    {
        // TODO
    }
}
