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
        //Listado de comandos
        $commands = [];

        //Listar los archivos de comandos
        $list = glob(__DIR__."/*.php");

        foreach ($list as $key => $file) {

            $baseName = basename($file);
            $nameClass = str_replace(".php", "", $baseName);
            $class = "\HorizonFramework\Core\CLI\Commands\\".$nameClass;
            $instance = new $class();

            $commands = array_merge($commands, [
                $instance->name => $class
            ]);
        }

        $this->newLine(2);
        
        $this->info("Listado De Comandos Registrados");
        
        foreach ($commands as $command => $class) {
            $description = (new $class)->description;
            $this->line("$command: $description");
        }

        $this->newLine(2);
    }
}
