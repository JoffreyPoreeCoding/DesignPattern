<?php

namespace JPC\DesignPattern;

trait Multiton {

    protected static $instance = [];

    public static function getInstance($identifier) {
        $class = get_called_class();
        
        $params = array_slice(func_get_args(), 1);

        if (!isset(static::$instance[$identifier])) {
            $reflection = new \ReflectionClass($class);
            $constructor = $reflection->getConstructor();

            $object = $reflection->newInstanceWithoutConstructor();

            if ($constructor != null) {
                $constructor->invokeArgs($object, $params);
            }

            static::$instance[$identifier] = $object;
        }

        return static::$instance[$identifier];
    }

    protected static function setInstance($identifier, $instance) {
        static::$instance[$identifier] = $instance;
    }

    public function __clone() {
        throw new Exception\MultitonException("Unable to clone a multiton object");
    }

    public function __wakeup() {
        throw new Exception\MultitonException("Unable to unserialize a multiton object");
    }
}
