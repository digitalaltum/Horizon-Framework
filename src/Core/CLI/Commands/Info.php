<?php

namespace HorizonFramework\Core\CLI\Commands;

use HorizonFramework\Core\CLI\Interpreter;
use HorizonFramework\Core\Bases\BaseCommands;

class Info extends BaseCommands
{
    public $name = "info";

    public $description = "Lista todos los comandos disponibles";

    public function handle()
    {
        $list = Interpreter::COMMANDS;

        foreach ($list as $command => $class) {
            $description = (new $class)->description;
            echo "$command: $description" . PHP_EOL;
        }
    }
}
