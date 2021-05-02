<?php


namespace App\Ride\Application\Requests;


use App\Core\Application\Requests\ApiRequest;
use App\Ride\Domain\Models\VehicleType;
use Illuminate\Validation\Rule;

class StoreRideRequest extends ApiRequest {

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     * @throws \ReflectionException
     */
    public function rules(): array {
        return [
            "vehicleType"       => ['required', Rule::in(VehicleType::getValues())],
            "pickUp.name"       => 'required|string',
            "pickUp.latitude"   => ['required', 'regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/'],
            "pickUp.longitude"  => ['required', 'regex:/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/'],
            "dropOff.name"      => 'required|string',
            "dropOff.latitude"  => ['required', 'regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/'],
            "dropOff.longitude" => ['required', 'regex:/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/'],
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes(): array {
        return [
            'vehicleType'       => trans('ride.vehicleType'),
            'pickUp.name'       => trans('ride.pickUp.name'),
            'pickUp.latitude'   => trans('ride.pickUp.latitude'),
            'pickUp.longitude'  => trans('ride.pickUp.longitude'),
            'dropOff.name'      => trans('ride.dropOff.name'),
            'dropOff.latitude'  => trans('ride.dropOff.latitude'),
            'dropOff.longitude' => trans('ride.dropOff.longitude'),
        ];
    }

}
