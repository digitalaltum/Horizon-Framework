<?php

namespace HorizonFramework\Core\Bases;

class BaseCommands
{
    private $colors = [
        'black' => '40',
        'red' => '41',
        'green' => '42',
        'yellow' => '43',
        'blue' => '44',
        'magenta' => '45',
        'cyan' => '46',
        'white' => '47',
    ];
    
    protected function info($output)
    {
        echo "\033[44m\033[37m$output\033[0m\n". PHP_EOL;
    }

    protected function error($output)
    {
        echo "\033[41m\033[37m$output\033[0m\n". PHP_EOL;
    }

    protected function warning($output)
    {
        echo "\033[43m\033[37m$output\033[0m\n". PHP_EOL;
    }

    protected function success($output)
    {
        echo "\033[42m\033[37m$output\033[0m\n". PHP_EOL;
    }
}
