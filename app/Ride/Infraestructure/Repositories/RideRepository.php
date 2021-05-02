<?php


namespace App\Ride\Infraestructure\Repositories;


use App\Core\Infraestructure\Repositories\RepositoryContract;
use App\Ride\Domain\Models\Ride;
use Illuminate\Support\Collection;

class RideRepository implements RepositoryContract {

    /**
     * @return Ride[]|Collection
     */
    public function all() {
        return Ride::all();
    }

    /**
     * @param string $searchTerm
     * @return Collection
     */
    public function findByUuidOrLocationName(string $searchTerm): Collection {
        return Ride::select('rides.*')
                   ->join('locations as pickL', 'rides.pick_up_location_id', '=', 'pickL.id')
                   ->join('locations as dropL', 'rides.drop_off_location_id', '=', 'dropL.id')
                   ->orwhere('rides.id', $searchTerm)
                   ->orWhere('pickL.name', $searchTerm)
                   ->orWhere('dropL.name', $searchTerm)
                   ->get();
    }
}
