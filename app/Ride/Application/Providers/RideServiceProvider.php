<?php


namespace App\Ride\Application\Providers;


use App\Core\Infraestructure\Repositories\RepositoryContract;
use App\Ride\Infraestructure\Repositories\LocationRepository;
use App\Ride\Infraestructure\Repositories\RideRepository;
use App\Ride\Infraestructure\Services\ListRidesService;
use App\Ride\Infraestructure\Services\StoreRideService;
use Dingo\Api\Provider\ServiceProvider;

class RideServiceProvider extends ServiceProvider {

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void {

        $this->app->bind(RepositoryContract::class, LocationRepository::class);
        $this->app->bind(RepositoryContract::class, RideRepository::class);

        $this->app->bind('ListRidesService', static function (RideRepository $repository) {
            return new ListRidesService($repository);
        });

        $this->app->bind('StoreRideService', static function (RideRepository $repository) {
            return new StoreRideService($repository);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void {
        //
    }
}
