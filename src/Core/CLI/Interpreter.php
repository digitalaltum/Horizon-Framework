<?php

namespace HorizonFramework\Core\CLI;

/**
 * Clase Interpreter que interpreta y ejecuta comandos de la línea de comandos.
 */
class Interpreter
{
    /**
     * @var string $command El comando proporcionado.
     */
    private $command;

    /**
     * @var array $flags Los argumentos adicionales pasados con el comando.
     */
    private $options;
    private $argument;

    /**
     * Constructor. Recibe una instancia de la clase Argv.
     *
     * @param ArgvInput $argv Instancia de la clase ArgvInput que contiene los argumentos de la línea de comandos.
     */
    public function __construct(ArgvInput $argv)
    {
        $this->command = $argv->command;
        $this->options = $argv->options;
        $this->argument = $argv->argument;
    }

    /**
     * Ejecuta el comando especificado.
     */
    public function run()
    {
        //Listado de comandos
        $commands = [];

        //Listar los archivos de comandos
        $list = glob(__DIR__."/Commands/*.php");

        foreach ($list as $key => $file) {

            $baseName = basename($file);
            $nameClass = str_replace(".php", "", $baseName);
            $class = "\HorizonFramework\Core\CLI\Commands\\".$nameClass;
            $instance = new $class();

            $commands = array_merge($commands, [
                $instance->name => $class
            ]);
        }

        //Listar los archivos de comandos
        $list = glob("app/Console/*.php");

        foreach ($list as $key => $file) {

            $baseName = basename($file);
            $nameClass = str_replace(".php", "", $baseName);
            $class = "\App\Console\\".$nameClass;
            $instance = new $class();

            $commands = array_merge($commands, [
                $instance->name => $class
            ]);
        }
        
        // Verifica si el comando está registrado y lo ejecuta.
        if (isset($commands[$this->command])) {

            $commandInstance = new $commands[$this->command];
            $commandInstance->options = $this->options;
            $commandInstance->argument = $this->argument;
            $commandInstance->handle();

        } else {

            //Recomendaciones:
            foreach ($commands as $name => $class) {
                $search = stripos($this->command, $name);
                if ($search !== false) {
                    echo "Tal vez quieres ejecutar: " . $name . PHP_EOL;
                    die();
                }
            }

            // Manejar el caso cuando el comando no está registrado.
            echo "Comando no reconocido: {$this->command}" . PHP_EOL;
        }
    }
}
