<?php
namespace Granam\Boolean;

class BooleanInterfaceTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function interface_exists()
    {
        $this->assertTrue(interface_exists('Granam\Boolean\BooleanInterface'));
    }

    /** @test */
    public function inherits_from_scalar_interface()
    {
        $this->assertTrue(is_a('Granam\Boolean\BooleanInterface', 'Granam\Scalar\ScalarInterface', true /* allow string as tested class name*/));
    }
}
