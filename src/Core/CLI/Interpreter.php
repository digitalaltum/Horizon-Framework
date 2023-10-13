<?php

namespace HorizonFramework\Core\CLI;

class Interpreter
{
    const COMMANDS = [
        'info'  => \HorizonFramework\Core\CLI\Commands\Info::class,
        'serve' => \HorizonFramework\Core\CLI\Commands\Serve::class,
    ];

    private $all;
    private $command;
    private $flags;

    public function __construct()
    {

        $this->all = $_SERVER["argv"];
        $this->command = $_SERVER["argv"][1];
        $this->flags = array_slice($_SERVER["argv"], 2);

        $this->run();
    }

    private function run()
    {
        $class = self::COMMANDS;
        (new $class[$this->command])->handle();
    }


}
