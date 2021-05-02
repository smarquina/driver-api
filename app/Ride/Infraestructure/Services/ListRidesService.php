<?php


namespace App\Ride\Infraestructure\Services;


use App\Core\Infraestructure\Services\BaseService;
use App\Ride\Infraestructure\Repositories\RideRepository;
use Illuminate\Database\Eloquent\Collection;

class ListRidesService extends BaseService {

    /**
     * ListRidesService constructor.
     * @param \App\Ride\Infraestructure\Repositories\RideRepository $repository
     */
    public function __construct(RideRepository $repository) {
        parent::__construct($repository);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getRides(): Collection {
        return $this->getRepository()->all();
    }

    /**
     * @param string $searchTerm
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function searchRides(string $searchTerm): Collection {
        return $this->getRepository()->findByUuidOrLocationName($searchTerm);
    }
}
