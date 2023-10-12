<?php

namespace HorizonFramework\Core;

use Dotenv\Dotenv;

class Application
{

    public static function start($base_path, $time) {

        

        return new self($base_path, $time);
    }

    private $basePath;
    private $startTime;

    public function __construct($base_path, $time) {
        $this->basePath = $base_path;
        $this->startTime = $time;
    }

    public function singleton($class)
    {
        $class::mount($this->basePath);
    }
    
}
