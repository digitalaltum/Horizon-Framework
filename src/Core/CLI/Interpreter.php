<?php

namespace HorizonFramework\Core\CLI;

class Interpreter
{
    /* Registro de comandos. */
    const COMMANDS = [
        'info'  => \HorizonFramework\Core\CLI\Commands\Info::class,
        'serve' => \HorizonFramework\Core\CLI\Commands\Serve::class,
    ];

    /* Propiedades del objeto */
    private $command;
    private $flags;

    /**
     * Recibe una instancia de la clase Argv
     * @param mixed $argv
     */
    public function __construct($argv)
    {
        $this->command = $argv->command;
        $this->flags = $argv->flags;
    }

    /**
     * ejecuta los comandos.
     * @return static
     */
    public function run()
    {
        $class = self::COMMANDS;
        (new $class[$this->command])->handle();
    }

}
