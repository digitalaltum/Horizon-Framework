<?php

namespace HorizonFramework\Core\CLI;

use HorizonFramework\Core\Config\Config;

class Kernel
{
    /**
     * Genera la antesala a cualquier ejecucion de comandos por CLI.
     * @param mixed $baseRoot
     * @param mixed $starTime
     */
    public function __construct($baseRoot, $starTime)
    {
        $config = new Config($baseRoot, $starTime);
    }

    /**
     * Se encarga de la ejecucion de los comandos y de retornar el estatus de la ejecucion.
     * @param mixed $inputCLI
     * @param mixed $interpreter
     * 
     * @return bool
     */
    public function handle($inputCLI, $interpreter)
    {
        return new $interpreter($inputCLI);
    }
}
