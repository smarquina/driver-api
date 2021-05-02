<?php

namespace App\Ride\Application\Controllers;

use App\Core\Application\Controllers\Controller as BaseController;
use App\Ride\Application\Requests\StoreRideRequest;
use App\Ride\Application\Resources\RideCollection;
use App\Ride\Application\Resources\RideResource;
use App\Ride\Infraestructure\Services\ListRidesService;
use App\Ride\Infraestructure\Services\StoreRideService;
use Illuminate\Http\JsonResponse;

class RideController extends BaseController {

    /**
     * @param ListRidesService $service
     * @return JsonResponse
     *
     * @OA\Get(
     *   path="/api/rides/list",
     *   summary="list of rides",
     *   tags={"ride"},
     *   operationId="list",

     *  @OA\Parameter(
     *     name="pageSize",
     *     in="query",
     *     required=false,
     *     description="Pagination size per page",
     *     @OA\Schema(type="integer")
     *  ),
     *  @OA\Parameter(
     *     name="page",
     *     in="query",
     *     required=false,
     *     description="Pagination page",
     *     @OA\Schema(type="integer")
     *  ),
     *  @OA\Response(
     *     response=200,
     *     description="A list of rides",
     *     @OA\JsonContent(type="array",
     *       @OA\Items(ref="#/components/schemas/Ride")
     *   ),
     *   )
     * )
     */
    public function list(ListRidesService $service): JsonResponse {
        $rides = $service->getRides();

        return response()->json($this->paginate(new RideCollection($rides)));
    }

    /**
     * @param ListRidesService $service
     * @param string           $searchTerm
     * @return JsonResponse
     *
     * @OA\Get(
     *   path="/api/rides/list/search",
     *   summary="list of rides filtered by uuid, pick up/drop off location name",
     *   tags={"ride"},
     *   operationId="search",
     *
     *  @OA\Parameter(
     *     name="searchTerm",
     *     in="path",
     *     required=true,
     *     description="uuid, pick up/drop off location name",
     *     @OA\Schema(type="string")
     *  ),
     *  @OA\Parameter(
     *     name="pageSize",
     *     in="query",
     *     required=false,
     *     description="Pagination size per page",
     *     @OA\Schema(type="integer")
     *  ),
     *  @OA\Parameter(
     *     name="page",
     *     in="query",
     *     required=false,
     *     description="Pagination page",
     *     @OA\Schema(type="integer")
     *  ),
     *  @OA\Response(
     *     response=200,
     *     description="A list of rides",
     *     @OA\JsonContent(type="array",
     *       @OA\Items(ref="#/components/schemas/Ride")
     *   ),
     *   )
     * )
     */
    public function search(ListRidesService $service, string $searchTerm): JsonResponse {
        $rides = $service->searchRides($searchTerm);

        return response()->json($this->paginate(new RideCollection($rides)));
    }

    /**
     * @param StoreRideRequest $request
     * @param StoreRideService $service
     * @return RideResource
     * @throws \Exception
     *
     * @OA\Post(
     *   path="/api/rides/ride",
     *   summary="Store new ride with associated locations",
     *   tags={"ride"},
     *   operationId="store",
     *   @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     property="vehicleType",
     *                     type="string",
     *                     description="Required. Choices: {van,sub,sedan}"
     *                 ),
     *                 @OA\Property (
     *                     property="pickUp",
     *                     ref="#/components/schemas/Location",
     *                     description="Required",
     *                 ),
     *                 @OA\Property (
     *                     property="dropOff",
     *                     ref="#/components/schemas/Location",
     *                     description="Required",
     *                 ),
     *              ),
     *         )
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="Ok response",
     *    @OA\JsonContent(type="object",
     *      @OA\Property (property="data", ref="#/components/schemas/Location"),
     *    ),
     *  ),
     * @OA\Response(response="422", description="Request invalid. see errors"),
     * )
     */
    public function store(StoreRideRequest $request, StoreRideService $service): RideResource {
        $data        = collect($request->allSnake());
        $pickUpData  = $data->get('pick_up');
        $dropOffData = $data->get('drop_off');
        $rideData    = $data->only('vehicle_type')->toArray();

        $ride = $service->storeRideWithLocations($rideData, $pickUpData, $dropOffData);
        //TODO: manage Exception response message.

        return new RideResource($ride);
    }
}
