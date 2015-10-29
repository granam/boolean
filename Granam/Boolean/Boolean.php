<?php
namespace Granam\Boolean;

use Granam\Boolean\Tools\ToBoolean;
use Granam\Scalar\Scalar;

class Boolean extends Scalar implements BooleanInterface
{

    /**
     * @param mixed $value
     * @param bool $strict
     */
    public function __construct($value, $strict = false)
    {
        parent::__construct(ToBoolean::toBoolean($value, $strict));
    }

}
