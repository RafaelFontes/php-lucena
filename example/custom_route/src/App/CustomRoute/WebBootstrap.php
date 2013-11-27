<?php

namespace App\CustomRoute;

use App\CustomRoute\Factory\WebControllerFactory;
use App\CustomRoute\Router\WebRouter;
use Lucena\Core\App\Bootstrap;
use Lucena\Core\Base\IRouter;

class WebBootstrap extends Bootstrap {

    /**
     * @return WebRouter
     */
    public function &getRouter()
    {
        $router = new WebRouter();
        $router->parse();

        return $router;
    }

    /**
     * @param IRouter $router
     * @return WebControllerFactory
     */
    public function &getControllerFactory(IRouter &$router)
    {
        $factory = new WebControllerFactory($router);
        $factory->parse();

        return $factory;
    }
}