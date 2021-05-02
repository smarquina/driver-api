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
     */
    public function list(ListRidesService $service): JsonResponse {
        $rides = $service->getRides();

        return response()->json($this->paginate(new RideCollection($rides)));
    }

    /**
     * @param ListRidesService $service
     * @param string           $searchTerm
     * @return JsonResponse
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
