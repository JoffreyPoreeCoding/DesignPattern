<?php
namespace JPC\DesignPattern;

use PHPUnit\Framework\TestCase;

class SingletonTest extends TestCase
{

    public function test_singleton()
    {
        $firstInstance = SingletonClass::getInstance("value1");

        $secondOnstance = SingletonClass::getInstance("value2");

        $this->assertEquals($firstInstance, $secondOnstance);
        $this->assertEquals("value1", $firstInstance->value);
        $this->assertEquals("value1", $secondOnstance->value);
    }

}

class SingletonClass
{

    use \JPC\DesignPattern\Singleton;

    public $value;

    private function __construct($value)
    {
        $this->value = $value;
    }

}
