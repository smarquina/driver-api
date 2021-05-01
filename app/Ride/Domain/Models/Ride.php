<?php


namespace App\Ride\Domain\Models;



use App\Core\Domain\Models\BaseModel;
use App\Core\Domain\Models\UuidsTrait;

class Ride extends BaseModel {

    use UuidsTrait;

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'uuid';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'rides';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['vehicle_type'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = ['vehicle_type' => 'string'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pickUp(): \Illuminate\Database\Eloquent\Relations\BelongsTo {
        return $this->belongsTo(Location::class, 'pickup_location_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function dropOff(): \Illuminate\Database\Eloquent\Relations\BelongsTo {
        return $this->belongsTo(Location::class, 'dropOff_location_id');
    }


    /**
     * @return int
     */
    public function getUuId(): int {
        return $this->uuid;
    }

    /**
     * @return \App\Ride\Domain\Models\Location
     */
    public function getPickUp(): Location {
        return $this->pickUp;
    }

    /**
     * @param \App\Ride\Domain\Models\Location $pickUp
     * @return $this
     */
    public function setPickUp(Location $pickUp): self {
        $this->pickUp = $pickUp;
        return $this;
    }

    /**
     * @return \App\Ride\Domain\Models\Location
     */
    public function getDropOff(): Location {
        return $this->dropOff;
    }

    /**
     * @param \App\Ride\Domain\Models\Location $dropOff
     * @return $this
     */
    public function setDropOff(Location $dropOff): self {
        $this->dropOff = $dropOff;
        return $this;
    }

    /**
     * @return string
     */
    public function getVehicleType(): string {
        return $this->vehicle_type;
    }

    /**
     * @param string $type
     * @return $this
     */
    public function setVehicleType(string $type): self {
        $this->vehicle_type = $type;
        return $this;
    }
}
