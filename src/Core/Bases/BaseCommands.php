<?php

namespace HorizonFramework\Core\Bases;

use HorizonFramework\Core\CLI\Horizon;
use HorizonFramework\Core\CLI\ProgressBar;

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

    /**
     * Imprime valores en la pantalla.
     * @param string $value
     * 
     * @return string
     */
    protected function line(string $value)
    {
        echo $value. PHP_EOL;
    }

    /**
     * Genera saltos de linea vacios
     * @param int $lines
     * 
     * @return string
     */
    protected function newLine(int $lines = 1)
    {
        for ($i=0; $i < $lines; $i++) { 
            echo PHP_EOL;
        }
    }

    /**
     * Retorna una instancia de la barra de progreso
     * @param int $total
     * @param string $chart
     * 
     * @return static
     */
    protected function progressBar($total = 100, $chart = '=')
    {
        return new ProgressBar($total, $chart);
    }

    /**
     * Permite definir las posibles respuestas
     * @param string $pregunta
     * @param array $options
     * 
     * @return [type]
     */
    protected function anticipate(string $pregunta, array $options)
    {
        $optionsString = implode('/', $options);
        do {
            echo "$pregunta($optionsString)" . PHP_EOL;
            $respuesta = readline();
        } while (!in_array($respuesta, $options));

        return $respuesta;
    }

    /**
     * Select a traves de CLI
     * @param string $question
     * @param array $options
     * 
     * @return [type]
     */
    function choice(string $question, array $options)
    {
        $keys = array_keys($options);
        do {
            echo $question . PHP_EOL;
            foreach ($options as $key => $option) {
                echo "[$key] - $option" . PHP_EOL; 
            }
            $input = readline("Digite el número de la opción:");
        } while (!in_array($input, $keys));

        return $input;
    }

    /**
     * Metodo ask()
     * Permite hacer una pregunta abierta
     */
    protected function ask(string $question)
    {
        echo $question . PHP_EOL;
        $input = readline();

        return $input;
    } 

    /**
     * Metodo confirm()
     * Permite recibir true o false (Y/N)
     */
    protected function confirm(string $pregunta)
    {
        $options = ["Y", "n"];
        $optionsString = implode('/', $options);

        do {
            echo "$pregunta($optionsString)" . PHP_EOL;
            $respuesta = readline();
        } while (!in_array($respuesta, $options));

        return $respuesta == "Y";
    }


    /**
     * Metodo table()
     * Permite crear una tabla por CLI
     */
    protected function table(array $data, array $headers)
    {
        $this->newLine(2);
        
        echo implode("\t| ", $headers) . PHP_EOL;
        
        echo str_repeat("-", 50) . PHP_EOL;
        
        foreach ($data as $key => $value) {
            echo implode("\t| ", $value) . PHP_EOL;
        }
        
        $this->newLine(2);
    }

    /**
     * Metodo call()
     * Permite llamar algun comando existente.
     * Wrapper
     */
    protected function call(string $command)
    {
        return Horizon::call($command);
    }

    protected function argument(string $argument)
    {
        return isset($this->argument->{$argument});
    }

    protected function option(string $option)
    {
        return isset($this->options->{$option}) ? $this->options->{$option} : false;
    }  
    
}
