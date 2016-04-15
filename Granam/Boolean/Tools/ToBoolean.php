<?php
namespace Granam\Boolean\Tools;

use Granam\Scalar\Tools\ToScalar;

class ToBoolean
{
    /**
     * @param mixed $value
     * @param bool $strict = true Null is not allowed by default
     *
     * @return bool
     * @throws \Granam\Boolean\Tools\Exceptions\WrongParameterType
     */
    public static function toBoolean($value, $strict = true)
    {
        return (bool)self::convertToScalar($value, $strict);
    }

    /**
     * @param $value
     * @param bool $strict
     *
     * @return float|int|null|string
     * @throws \Granam\Boolean\Tools\Exceptions\WrongParameterType
     */
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
