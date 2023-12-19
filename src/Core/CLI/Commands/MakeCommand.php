<?php

namespace HorizonFramework\Core\CLI\Commands;

use HorizonFramework\Core\Bases\BaseCommands;

class MakeCommand extends BaseCommands
{
    public $name = "make:command";

    public $description = "Crea una clase de comando personalizada";

    public function handle()
    {
        $nombreClase = $this->option("class");
        $name = $this->option("name");
        $descripcion = $this->option("description");

        //Validar si existe
        if(file_exists("app/Console/{$nombreClase}.php")){
            return $this->error("El Archivo Ya Existe.");
        }

        $stub = file_get_contents(__DIR__."/../Stubs/TemplateCommand.stub");

        $output = str_replace(
            ["{{NAME_CLASS}}","{{NAME_COMMAND}}","{{DESCRIPTION}}"],
            [$nombreClase, $name, $descripcion],
            $stub
        );

        //Crear un archivo.
        if(file_put_contents("app/Console/{$nombreClase}.php",$output)){
            return $this->info("Arcnivo Creado: app\Console\\$nombreClase.php");
        }
        
    }

}
