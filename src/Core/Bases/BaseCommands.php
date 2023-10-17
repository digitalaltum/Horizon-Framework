<?php

namespace HorizonFramework\Core\Bases;

class BaseCommands
{
     /**
     * Retorna texto subrayado en azul
     * @param mixed $output
     * 
     * @return string
     */
    protected function info($output)
    {
        echo "\033[44m\033[37m$output\033[0m\n". PHP_EOL;
    }

     /**
     * Retorna texto subrayado en rojo
     * @param mixed $output
     * 
     * @return string
     */
    protected function error($output)
    {
        echo "\033[41m\033[37m$output\033[0m\n". PHP_EOL;
    }

     /**
     * Retorna texto subrayado en amarillo
     * @param mixed $output
     * 
     * @return string
     */
    protected function warning($output)
    {
        echo "\033[43m\033[37m$output\033[0m\n". PHP_EOL;
    }

     /**
     * Retorna texto subrayado en verde
     * @param mixed $output
     * 
     * @return string
     */
    protected function success($output)
    {
        echo "\033[42m\033[37m$output\033[0m\n". PHP_EOL;
    }
}
