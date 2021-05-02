<?php


namespace App\Ride\Application\Resources;


use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class RideResource
 * @package App\Ride\Application\Resources
 * @OA\Schema(schema="Ride", type="object")
 */
class RideResource extends JsonResource {

    /**
     * @OA\Property(
     *   property="id",
     *   type="string",
     *   nullable=false,
     * )
     */

    /**
     * @OA\Property(
     *   property="vehicleType",
     *   type="string",
     *   nullable=false,
     * )
     */

    /**
     * @OA\Property(
     *   property="pickUp",
     *   ref="#/components/schemas/Location",
     *   nullable=false,
     * )
     */


    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request) {
        /** @var \App\Ride\Domain\Models\Ride $ride */
        $ride = clone $this;

        return [
            'id'          => $ride->getId(),
            'vehicleType' => $ride->getVehicleType(),
            'pickUp'      => new LocationResource($ride->getPickUp()),
            'dropOff'     => new LocationResource($ride->getDropOff()),
        ];
    }
}
