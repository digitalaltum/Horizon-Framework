<?php

namespace HorizonFramework\Core\Bases;

abstract class BaseApplication
{

    /**
     * Para crear una instancia de la clase hija Hija::start(...)
     * @param mixed $baseRoot
     * @param mixed $starTime
     * 
     * @return static
     */
    public static function start($baseRoot, $starTime)
    {
        return new static($baseRoot, $starTime);
    }

    /**
     * Pra garantizar la unicializacion una unica vez de una clase
     * @param mixed $instance
     * 
     * @return static
     */
    abstract public function singleton($instance);
    
}
