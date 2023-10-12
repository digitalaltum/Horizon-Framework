<?php

namespace HorizonFramework\Core\CLI;

class Kernel
{

    private static $instance;

    private function __construct($basePath)
    {
        $app = require_once  $basePath . "/config/app.php";

        print_r($app);
        
    }

    public static function mount($basePath)
    {
        if (self::$instance === null) {
            self::$instance = new self($basePath);
        }
        return self::$instance;
    }

        
}
