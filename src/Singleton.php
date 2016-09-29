<?php

namespace JPC\DesignPattern;

trait Singleton {
    private static $instance;

    public static function getInstance(...$params) {
        $class = get_called_class();
        
        if (!isset(static::$instance)) {
            $reflection = new \ReflectionClass($class);
            $constructor = $reflection->getConstructor();
            
            $object = $reflection->newInstanceWithoutConstructor();
            
            if ($constructor != null) {
                $constructor->invokeArgs($object, $params);
            }
                    
            static::$instance = $object;
        }
        
        return static::$instance;
    }
    
    public function __clone(){
        throw new Exception\SingletonException("Unable to clone a singleton object");
    }
}
