<?php

namespace JPC\DesignPattern;

trait Multiton {
    private static $instance = [];

    public static function getInstance($identifier, ...$params) {
        $class = get_called_class();
        
        if (!isset(static::$instance[$identifier])) {
            $reflection = new \ReflectionClass($class);
            $constructor = $reflection->getConstructor();
            
            $object = $reflection->newInstanceWithoutConstructor();
            $constructor->invokeArgs($object, $params);
                    
            static::$instance[$identifier] = $object;
        }
        
        return static::$instance[$identifier];
    }
    
    public function __clone(){
        throw new Exception\MultitonException("Unable to clone a multiton object");
    }
}