<?php

namespace HorizonFramework\Core\CLI;

class ArgvInput
{
    /**
     * @var array $all Todos los argumentos pasados por la consola.
     */
    public $all;

    /**
     * @var string $command El comando proporcionado en la consola.
     */
    public $command;

    /**
     * @var array $flags Los argumentos adicionales pasados en la consola después del comando.
     */
    public $options;
    public $argument;

    /**
     * Constructor. Extrae los valores enviados por la consola.
     */
    public function __construct()
    {
        //Guarda como arreglo todos los valores del comando.
        $this->all = $_SERVER["argv"];

        //Extraer el comando
        $this->command = $_SERVER["argv"][1];

        //Logica para lectura de babderas
        $options = [];
        $argument = [];
        $flagsInput = array_slice($_SERVER["argv"], 2);
        foreach ($flagsInput as $key => $value) {

            $startFlag = stripos($value, "--");
            if ($startFlag == 0) {
                
                $withValue = stripos($value, "=");

                if ($withValue !== false) {

                    $flagSingle = str_replace("--", "", $value);
                    $flagSingle = explode("=", $flagSingle);

                    $options = array_merge($options, [
                        $flagSingle[0] => $flagSingle[1]
                    ]);
                    
                } else {

                    $flagSingle = str_replace("--", "", $value);

                    $argument = array_merge($argument, [
                        $flagSingle => true
                    ]);
                }

            }
        }

        
        $this->options = (object) $options;
        $this->argument = (object) $argument;
    }
}
