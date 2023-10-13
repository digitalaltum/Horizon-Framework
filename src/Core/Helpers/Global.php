<?php

if (! function_exists("env")) {

    /**
     * Leer configuracion de entorno
     * @param string $variable
     * @param null $default
     * 
     * @return mixed
     */
    function env(string $variable, $default = null)
    {
        return $_ENV[$variable] ?? $default;
    }
}