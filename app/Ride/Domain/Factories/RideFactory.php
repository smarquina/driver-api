<?php

namespace App\Ride\Domain\Factories;

use App\Ride\Domain\Models\Ride;
use App\Ride\Domain\Models\VehicleType;
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
            'pick_up_location_id'  => LocationFactory::new(),
            'drop_off_location_id' => LocationFactory::new(),
        ];
    }

}
