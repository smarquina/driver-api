<?php


namespace App\Core\Domain\Models;


/**
 * Trait EnumTrait
 * @package App\Domain\Common\Models
 */
trait EnumTrait {

    /**
     * Get all constant values.
     *
     * @return array
     * @throws \ReflectionException
     */
    static function getValues() {
        $class = new \ReflectionClass(get_called_class());
        return array_values($class->getConstants());
    }
}
