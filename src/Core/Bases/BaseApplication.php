<?php

namespace HorizonFramework\Core\Bases;

abstract class BaseApplication
{

    /**
     * Método estático para iniciar una instancia de la clase hija. Se recomienda usar Hija::start(...).
     *
     * @param mixed $baseRoot Ruta base de la aplicación.
     * @param mixed $starTime Tiempo de inicio de la aplicación.
     * 
     * @return static Una nueva instancia de la clase hija.
     */
    public static function start($baseRoot, $starTime)
    {
        return new static($baseRoot, $starTime);
    }

    /**
     * Método abstracto para garantizar la inicialización única de una clase como singleton.
     *
     * @param mixed $instance Instancia de la clase que se desea manejar como singleton.
     * 
     * @return static La instancia de la clase.
     */
    abstract public function singleton($instance);
    
}
