<?php

namespace Database\Seeders;

use Domain\Ride\Factories\RideFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void {
        RideFactory::times(10)->create();
    }
}
