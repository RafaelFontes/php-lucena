<?php

namespace App\CustomRoute;

use App\CustomRoute\Factory\WebControllerFactory;
use App\CustomRoute\Router\WebRouter;
use Lucena\Core\App\Bootstrap;
use Lucena\Core\Base\IRouter;
use Lucena\Core\Response;

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
     * @param Response $response
     * @return \Lucena\Core\Base\IControllerFactory
     */
    public function &getControllerFactory(IRouter &$router, Response $response)
    {
        $factory = new WebControllerFactory($router, $response);
        $factory->parse();

        return $factory;
    }
}