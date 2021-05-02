<?php


namespace App\Core\Application\Requests;


use Dingo\Api\Http\FormRequest;
use Illuminate\Support\Str;

class ApiRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool {
        return true;
    }

    /**
     * @param array|mixed|null $keys
     * @return array
     */
    public function allSnake($keys = null): array {
        $data = $this->all($keys);

        foreach ($data as $key => $value) {
            $newKey        = Str::snake($key);
            $data[$newKey] = $value;
            unset($data[$key]);
        }

        return $data;
    }

    /**
     * @param array|mixed|null $keys
     * @return array
     */
    public function all($keys = null): array {
        return $this->isJson()
            ? $this->json()->all()
            : parent::all($keys);
    }
}
