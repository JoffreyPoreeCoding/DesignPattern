<?php

namespace JPC\DesignPattern;

use PHPUnit\Framework\TestCase;

class MultitonTest extends TestCase
{

    public function test_multiton()
    {
        $firstInstance = MultitonClass::getInstance("instance1", "value1");
        $secondOnstance = MultitonClass::getInstance("instance1", "value2");

        $this->assertEquals($firstInstance, $secondOnstance);
        $this->assertEquals("value1", $firstInstance->value);
        $this->assertEquals("value1", $secondOnstance->value);

        $thridInstance = MultitonClass::getInstance("instance2", "value2");
        $fourthOnstance = MultitonClass::getInstance("instance2", "value1");

        $this->assertEquals($thridInstance, $fourthOnstance);
        $this->assertEquals("value2", $thridInstance->value);
        $this->assertEquals("value2", $fourthOnstance->value);
    }

}

class MultitonClass
{

    use \JPC\DesignPattern\Multiton;

    public $value;

    private function __construct($value)
    {
        $this->value = $value;
    }

}
