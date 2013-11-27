<?php


namespace App\CustomRoute\Router;

use Lucena\Core\App\ResponseType;
use Lucena\Core\App\Router;

class WebRouter extends Router {

    public function parse()
    {
        $this->responseType = new ResponseType();
    }

} 