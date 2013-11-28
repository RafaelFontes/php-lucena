<?php

namespace Lucena\Core;

class Response {

    public function __construct()
    {
        header("X-POWERED-BY: Lucena Framework v1.0");
    }

    public function writeError(\Exception $e)
    {
        echo "Error#{$e->getCode()}: " . $e->getMessage() . "\nLine " . $e->getLine() . "\nFile " . $e->getFile() ."\n";
        echo $e->getTraceAsString();
    }

    public function writeResponse($body)
    {
        echo $body;
    }
}