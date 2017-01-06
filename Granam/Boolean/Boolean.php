<?php
namespace Granam\Boolean;

use Granam\Boolean\Tools\ToBoolean;
use Granam\Scalar\Scalar;

class Boolean extends Scalar implements BooleanInterface
{

    /**
     * @param mixed $value
     * @param bool $strict = true On FALSE suppresses raising of an exception on NULL
     */
    public function __construct($value, $strict = true)
    {
        parent::__construct(ToBoolean::toBoolean($value, $strict));
    }

}