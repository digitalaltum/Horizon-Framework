<?php

namespace HorizonFramework\Core\CLI;

class ArgvInput
{
    /* Propiedades del Objeto */
    public $all;
    public $command;
    public $flags;

    /**
     * Extrae los valores enviados por la consola.
     */
    public function __construct() {
        $this->all = $_SERVER["argv"];
        $this->command = $_SERVER["argv"][1];
        $this->flags = array_slice($_SERVER["argv"], 2);
    }
    
}
