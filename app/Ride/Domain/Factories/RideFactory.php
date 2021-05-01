<?php

namespace App\Ride\Domain\Factories;

use App\Domain\Ride\Models\Ride;
use App\Domain\Ride\Models\VehicleType;
use Illuminate\Database\Eloquent\Factories\Factory;

class RideFactory extends Factory {
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ride::class;

    /**
     * Define the model's default state.
     *
     * @return array
     * @throws \ReflectionException
     */
    public function definition(): array {
        return [
            'uuid'                => $this->faker->uuid,
            'vehicle_type'        => $this->faker->randomElement(VehicleType::getValues()),
            'pickup_location_id'  => LocationFactory::new(),
            'dropOff_location_id' => LocationFactory::new(),
        ];
    }

}
