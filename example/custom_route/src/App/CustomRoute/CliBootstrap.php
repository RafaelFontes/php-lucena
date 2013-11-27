<?php


namespace App\CustomRoute;


use App\CustomRoute\Factory\WebControllerFactory;
use App\CustomRoute\Router\CliRouter;
use Lucena\Core\App\Bootstrap;
use Lucena\Core\Base\IBootstrap;
use Lucena\Core\Base\IControllerFactory;
use Lucena\Core\Base\IRouter;
use Lucena\Core\Response;

class CliBootstrap extends Bootstrap implements IBootstrap {

    /**
     * @return IRouter
     */
    public function &getRouter()
    {
        $router = new CliRouter();
        $router->parse();

        return $router;
    }

    /**
     * @param IRouter $router
     * @param Response $response
     * @return IControllerFactory
     */
    public function &getControllerFactory(IRouter &$router, Response $response)
    {
        $factory = new WebControllerFactory($router, $response);
        $factory->parse();

        return $factory;
    }
}