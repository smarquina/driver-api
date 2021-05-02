<?php


namespace App\Ride\Domain\Models;



use App\Core\Domain\Models\BaseModel;
use App\Core\Domain\Models\UuidsTrait;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
    public function pickUp(): BelongsTo {
        return $this->belongsTo(Location::class, 'pick_up_location_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function dropOff(): BelongsTo {
        return $this->belongsTo(Location::class, 'drop_off_location_id');
    }

    /**
     * @return string
     */
    public function getUuId(): string {
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
        $this->pick_up_location_id = $pickUp->getId();
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
        $this->drop_off_location_id = $dropOff->getId();
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
