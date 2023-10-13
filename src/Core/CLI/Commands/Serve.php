<?php

namespace HorizonFramework\Core\CLI\Commands;

use HorizonFramework\Core\Bases\BaseCommands;

class Serve extends BaseCommands
{
    public $name = "serve";

    public $description = "Iniciaiza el servidor local de desarrollo";

    public function handle()
    {
        $this->info("Inicializando Servidor Local De Desarrollo");
        shell_exec("php -S localhost:8082 -t public");
    }

}
