<?php
namespace Granam\Boolean\Tools;

use Granam\Scalar\Tools\ToScalar;

class ToBoolean
{
    /**
     * @param mixed $value
     * @param bool $strict = false Can force NULL to be refused by raising an exception
     *
     * @return bool
     */
    public static function toBoolean($value, $strict = false)
    {
        $value = self::convertToScalar($value, $strict);

        return boolval($value);
    }

    private static function convertToScalar($value, $strict)
    {
        try {
            return ToScalar::toScalar($value, $strict);
        } catch (\Granam\Scalar\Tools\Exceptions\WrongParameterType $scalarException) {
            // wrapping by local one
            throw new Exceptions\WrongParameterType(
                $scalarException->getMessage(),
                $scalarException->getCode(),
                $scalarException
            );
        }
    }
}
