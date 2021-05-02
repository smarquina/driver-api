<?php

namespace App\Ride\Domain\Factories;


use App\Ride\Domain\Models\Location;
use Illuminate\Database\Eloquent\Factories\Factory;

class LocationFactory extends Factory {
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Location::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array {
        return [
            'name'      => $this->faker->address,
            'latitude'  => $this->faker->latitude,
            'longitude' => $this->faker->longitude,
        ];
    }
}
