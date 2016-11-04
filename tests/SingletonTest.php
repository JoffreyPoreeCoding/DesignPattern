<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SingletonTest
 *
 * @author JoffreyP
 */
class SingletonTest extends PHPUnit_Framework_TestCase{
    
    public function test_singleton(){
        $firstInstance = SingletonClass::getInstance("value1");
        
        $secondOnstance = SingletonClass::getInstance("value2");
        
        $this->assertEquals($firstInstance, $secondOnstance);
        $this->assertEquals("value1", $firstInstance->value);
        $this->assertEquals("value1", $secondOnstance->value);
    }
    
}

class SingletonClass {
    
    use JPC\DesignPattern\Singleton;
    
    public $value;
    
    public function __construct($value) {
        $this->value = $value;
    }

}
