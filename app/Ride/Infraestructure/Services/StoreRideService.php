<?php


namespace App\Ride\Infraestructure\Services;


use App\Core\Infraestructure\Services\BaseService;
use App\Ride\Domain\Models\Location;
use App\Ride\Domain\Models\Ride;
use App\Ride\Infraestructure\Repositories\RideRepository;
use Illuminate\Support\Facades\DB;

class StoreRideService extends BaseService {

    /**
     * StoreRideService constructor.
     * @param \App\Ride\Infraestructure\Repositories\RideRepository $repository
     */
    public function __construct(RideRepository $repository) {
        parent::__construct($repository);
    }

    /**
     * @param array $rideData
     * @param array $pickUpData
     * @param array $dropOffData
     * @return \App\Ride\Domain\Models\Ride
     * @throws \Exception
     */
    public function storeRideWithLocations(array $rideData, array $pickUpData, array $dropOffData): Ride {
        try {
            DB::beginTransaction();

            $pickUpLocation = new Location($pickUpData);
            $pickUpLocation->save();

            $dropOffLocation = new Location($dropOffData);
            $dropOffLocation->save();

            $ride = new Ride($rideData);
            $ride->setPickUp($pickUpLocation)
                 ->setDropOff($dropOffLocation)
                 ->save();

            DB::commit();

            return $ride;
        } catch (\Exception $exception) {
            DB::rollBack();

            throw $exception;
        }
    }
}
