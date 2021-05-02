<?php


namespace App\Ride\Application\Resources;


use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class LocationResource
 * @package App\Ride\Application\Resources
 * @OA\Schema(schema="Location", type="object")
 */
class LocationResource extends JsonResource {

    /**
     * @OA\Property(
     *   property="id",
     *   type="integer",
     *   nullable=false,
     * )
     */

    /**
     * @OA\Property(
     *   property="name",
     *   type="string",
     *   nullable=false,
     * )
     */

    /**
     * @OA\Property(
     *   property="latitude",
     *   type="float",
     *   nullable=true,
     * )
     */

    /**
     * @OA\Property(
     *   property="longitude",
     *   type="float",
     *   nullable=true,
     * )
     */

    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request): array {
        /** @var \App\Ride\Domain\Models\Location $location */
        $location = clone $this;

        return [
            'id'        => $location->getId(),
            'name'      => $location->getName(),
            'latitude'  => $location->getLatitude(),
            'longitude' => $location->getLongitude(),
        ];
    }
}
