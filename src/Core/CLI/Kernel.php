<?php

namespace HorizonFramework\Core\CLI;

use Dotenv\Dotenv;

class Kernel
{
    private static $instance;

    private function __construct($baseRoot, $starTime)
    {
        //1. Cargar el entorno.
        $dotenv = Dotenv::createImmutable($baseRoot);
        $dotenv->load();

        if (! file_exists($baseRoot . "/bootstrap/cache/config.php")) {

            //2. Leer la configuracion
            $config = require_once $baseRoot ."/config/app.php";
    
            //3. crear arreglo definitivo
            $config = array_merge([
                'base_root' => $baseRoot,
                'start_app' => $starTime,
            ], $config);
            
            //4. Crear Cache
            $cache = "<?php return " . var_export($config, true) . ";";
            $fileCache = fopen($baseRoot . "/bootstrap/cache/config.php", 'w');
            fwrite($fileCache, $cache);
            fclose($fileCache);
        }
       
    }

    public static function mount($baseRoot, $starTime)
    {
        if (self::$instance === null) {
            self::$instance = new self($baseRoot, $starTime);
        }

        return self::$instance;
    }
}
