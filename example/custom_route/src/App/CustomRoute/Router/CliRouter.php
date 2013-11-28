<?php


namespace App\CustomRoute\Router;


use Lucena\Core\App\ResponseType;
use Lucena\Core\App\Router;

class CliRouter extends Router {

    public function parse()
    {
        $this->responseType = new ResponseType();

        if (!empty($_SERVER['argv']))
        {
            $argv =& $_SERVER['argv'];

            array_shift($argv);
            $this->setRequestString(implode($this->requestStringSeparator, $argv));
        }
    }

    public function getRequestParts()
    {
        $parts = $this->requestParts;

        array_shift($parts);

        return $parts;
    }
}