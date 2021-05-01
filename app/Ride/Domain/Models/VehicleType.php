<?php


namespace App\Ride\Domain\Models;



use App\Core\Domain\Models\EnumTrait;

class VehicleType {

    use EnumTrait;

    const SUV   = 'suv';
    const SEDAN = 'sedan';
    const VAN   = 'van';
}
