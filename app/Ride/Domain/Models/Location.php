<?php


namespace App\Ride\Domain\Models;



use App\Core\Domain\Models\BaseModel;

class Location extends BaseModel {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'locations';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name',
                           'latitude',
                           'longitude'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = ['name'      => 'string',
                        'latitude'  => 'float',
                        'longitude' => 'float',
    ];

    /**
     * @return int
     */
    public function getId(): int {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName(string $name): self {
        $this->name = $name;
        return $this;
    }

    /**
     * @return float
     */
    public function getLatitude(): float {
        return $this->latitude;
    }

    /**
     * @param float $latitude
     * @return $this
     */
    public function setLatitude(float $latitude): self {
        $this->latitude = $latitude;
        return $this;
    }

    /**
     * @return float
     */
    public function getLongitude(): float {
        return $this->longitude;
    }

    /**
     * @param float $longitude
     * @return $this
     */
    public function setLongitude(float $longitude): self {
        $this->longitude = $longitude;
        return $this;
    }


}
