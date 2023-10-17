<?php

namespace HorizonFramework\Core;

use HorizonFramework\Core\Bases\BaseApplication;

class Application extends BaseApplication
{
    /* Para control de singletones */
    private static $instances;

    /* Propiedades de la clase */
    private $baseRoot;
    private $starTime;

    /**
     * Inicializador con los valores bases para iniciar lectura de configuración.
     * @param mixed $baseRoot
     * @param mixed $starTime
     */
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

    /**
     * Alias del Singleton para iniciar una sola instancia.
     * @param mixed $instance
     * 
     * @return static
     */
    public function make($instance)
    {
        return $this->singleton($instance);
    }

}
