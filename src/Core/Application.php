<?php

namespace HorizonFramework\Core;

use HorizonFramework\Core\Bases\BaseApplication;

class Application extends BaseApplication
{
    private static $instances;
    private $baseRoot;
    private $starTime;

    public function __construct($baseRoot, $starTime)
    {
        $this->baseRoot = $baseRoot;
        $this->starTime = $starTime;
    }

    /**
     * Crea una unica instancia de una clase cualquiera.
     * @param mixed $instance
     * 
     * @return static
     */
    public function singleton($instance)
    {
        if (!isset(self::$instances[$instance])) {
            self::$instances[$instance] = new $instance($this->baseRoot, $this->starTime);
        }
        
        return self::$instances[$instance];
    }
}
