<?php

namespace HorizonFramework\Core\Config;

use Dotenv\Dotenv;

class Config
{
    private $baseRoot;
    private $starTime;

    /**
     * Monta el entorno del ENV
     * @param mixed $baseRoot
     * @param mixed $starTime
     */
    public function __construct($baseRoot, $starTime) {

        $this->baseRoot = $baseRoot;
        $this->starTime = $starTime;

        /* Montar Entorno */
        $dotenv = Dotenv::createImmutable($baseRoot);
        $dotenv->load();      
    }

    /**
     * Crear el archivo en cache
     * php horizon config:cache
     * @return 
     */
    public function cache()
    {
        if (!_file_exists($baseRoot . "/bootstrap/cache/config.php", 'w')) {

            //Leer los valores de configuracion
            $config = require_once $this->baseRoot ."/config/app.php";
    
            //Crear un unico arreglo
            $config = array_merge([
                'base_root' => $this->baseRoot,
                'start_app' => $this->starTime,
            ], $config);
            
            //Crear archivo de configuracion.
            $cache = "<?php return " . var_export($config, true) . ";";
            $fileCache = fopen($baseRoot . "/bootstrap/cache/config.php", 'w');
            fwrite($fileCache, $cache);
            fclose($fileCache);
        }
    }

}
