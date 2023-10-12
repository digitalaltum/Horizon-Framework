<?php

namespace HorizonFramework\Core;

class Application
{
    public static function start($baseRoot, $starTime)
    {
        return new self($baseRoot, $starTime);
    }

    private $baseRoot;
    private $starTime;

    public function __construct($baseRoot, $starTime)
    {
        $this->baseRoot = $baseRoot;
        $this->starTime = $starTime;
    }

    public function singleton($instance)
    {
        $kernel = $instance::mount($this->baseRoot, $this->starTime);
    }
}
