<?php

namespace HorizonFramework\Core\CLI;

use HorizonFramework\Core\CLI\Commands\Test;

class Horizon
{
    public static function call(string $command)
    {
        echo shell_exec("php horizon $command");
    }
}
