<?php

namespace JPC\DesignPattern;

trait Singleton {

    protected static $instance;
    
    protected abstract function __construct();

    public static function getInstance() {
        $class = get_called_class();
        
        $params = func_get_args();

        if (!isset(static::$instance)) {
            $reflection = new \ReflectionClass($class);
            $constructor = $reflection->getConstructor();
            $constructor->setAccessible(true);

            $object = $reflection->newInstanceWithoutConstructor();

            if ($constructor != null) {
                $constructor->invokeArgs($object, $params);
            }

            static::$instance = $object;
        }

        return static::$instance;
    }

    protected static function setInstance($instance) {
        static::$instance = $instance;
    }

    public function __clone() {
        throw new Exception\SingletonException("Unable to clone a singleton object");
    }

    public function __wakeup() {
        if ($this->getInstance() != null) {
            throw new Exception\SingletonException("Unable to unserialize a singleton object");
        } else {
            static::setInstance($this);
        }
    }

}
