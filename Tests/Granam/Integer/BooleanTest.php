<?php
namespace Granam\Boolean;

class BooleanTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function I_can_create_boolean_object()
    {
        $booleanObject = new Boolean(true);
        $this->assertNotNull($booleanObject);
        $this->assertInstanceOf('Granam\Boolean\BooleanInterface', $booleanObject);
    }

    /**
     * @test
     */
    public function I_can_get_value()
    {
        $withFalse = new Boolean($false = false);
        $this->assertSame($false, $withFalse->getValue());
        $this->assertSame((string)$false, (string)$withFalse);
        $this->assertSame('', (string)$withFalse);
        $withTrue = new Boolean($true = true);
        $this->assertSame($true, $withTrue->getValue());
        $this->assertSame((string)$true, (string)$withTrue);
        $this->assertSame('1', (string)$withTrue);
        $withString = new Boolean($stringValue = '');
        $this->assertSame(boolval($stringValue), $withString->getValue());
        $this->assertSame($stringValue, (string)$withString);
        $withInteger = new Boolean($integerValue = 123456);
        $this->assertSame('1', (string)$withInteger);
        $this->assertSame(true, $withInteger->getValue());
    }

    /**
     * @test
     */
    public function I_can_use_any_number()
    {
        foreach ([1.0, -2.36, 99.99, 8, -55] as $value) {
            $boolean = new Boolean($value );
            $this->assertSame(true, $boolean->getValue());
            $this->assertSame(boolval($value), $boolean->getValue());
        }
    }

    /**
     * @test
     */
    public function I_can_use_zero_to_get_false()
    {
        $boolean = new Boolean($integerZero = 0);
        $this->assertSame(false, $boolean->getValue());
        $this->assertSame(boolval($integerZero), $boolean->getValue());
        $boolean = new Boolean($floatZero = 0.0);
        $this->assertSame(false, $boolean->getValue());
        $this->assertSame(boolval($floatZero), $boolean->getValue());
    }

    /**
     * @test
     */
    public function I_can_use_null_as_false_if_not_strict()
    {
        $boolean = new Boolean(null);
        $this->assertSame(false, $boolean->getValue());
        $this->assertSame(boolval(null), $boolean->getValue());
    }

    /**
     * @test
     * @expectedException \Granam\Boolean\Tools\Exceptions\WrongParameterType
     */
    public function I_can_not_use_null_if_strict()
    {
        new Boolean(null, true /* strict */);
    }

    /**
     * @test
     * @expectedException \Granam\Boolean\Tools\Exceptions\WrongParameterType
     */
    public function I_cannot_use_array()
    {
        new Boolean([]);
    }

    /**
     * @test
     * @expectedException \Granam\Boolean\Tools\Exceptions\WrongParameterType
     */
    public function I_cannot_use_resource()
    {
        new Boolean(tmpfile());
    }

    /**
     * @test
     * @expectedException \Granam\Boolean\Tools\Exceptions\WrongParameterType
     */
    public function I_cannot_use_object()
    {
        new Boolean(new \stdClass());
    }

    /**
     * @test
     */
    public function I_can_use_to_string_object()
    {
        $boolean = new Boolean(new TestWithToString($integerZero = 0));
        $this->assertSame(boolval($integerZero), $boolean->getValue());
        $boolean = new Boolean(new TestWithToString($integer = 12345));
        $this->assertSame(boolval($integer), $boolean->getValue());
        $stringBoolean = new Boolean(new TestWithToString($stringInteger = '98765'));
        $this->assertSame(boolval($stringInteger), $stringBoolean->getValue());
        $floatBoolean = new Boolean(new TestWithToString($float = 123.456));
        $this->assertSame(boolval($float), $floatBoolean->getValue());
        $stringFloatBoolean = new Boolean(new TestWithToString($stringFloat = '987.654'));
        $this->assertSame(boolval($stringFloat), $stringFloatBoolean->getValue());
        $stringFloatBoolean = new Boolean(new TestWithToString($emptyString = ''));
        $this->assertSame(boolval($emptyString), $stringFloatBoolean->getValue());
        $stringFloatBoolean = new Boolean(new TestWithToString($someString = 'foo'));
        $this->assertSame(boolval($someString), $stringFloatBoolean->getValue());
    }
}

/** inner */
class TestWithToString
{
    private $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public function __toString()
    {
        return (string)$this->value;
    }
}
